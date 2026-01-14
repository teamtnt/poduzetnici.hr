#!/bin/bash
set -e

# Configuration
# You can override these variables by setting them in your environment
# IMAGE_OWNER can be your username OR your organization name
IMAGE_OWNER="${IMAGE_OWNER:-teamtnt}"
IMAGE_NAME="${IMAGE_NAME:-poduzetnici}"

# 1. Update composer.json version and date using PHP
echo "Updating composer.json version and date..."
TAG=$(php -r '
    $file = "composer.json";
    if (!file_exists($file)) exit(1);
    
    $json = json_decode(file_get_contents($file), true, 512, JSON_THROW_ON_ERROR);
    
    // Parse version
    $versionParts = explode(".", $json["version"] ?? "0.0.0");
    if (count($versionParts) < 3) {
        // Enforce semver 3 parts if missing
        $versionParts = array_pad($versionParts, 3, "0");
    }
    
    // Increment patch version
    $versionParts[count($versionParts) - 1]++;
    $newVersion = implode(".", $versionParts);
    
    // Update fields
    $json["version"] = $newVersion;
    if (!isset($json["extra"])) $json["extra"] = [];
    $json["extra"]["releaseDate"] = date("d.m.Y");
    
    // Save back to file (pretty print + unescaped slashes)
    file_put_contents($file, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n");
    
    echo $newVersion;
')

if [ -z "$TAG" ]; then
    echo "Failed to update composer.json version."
    exit 1
fi

echo "New version: $TAG"

FULL_IMAGE_NAME="ghcr.io/$IMAGE_OWNER/$IMAGE_NAME:$TAG"
LATEST_IMAGE_NAME="ghcr.io/$IMAGE_OWNER/$IMAGE_NAME:latest"

# Ensure we are in the project root by checking for the dockerfile
if [ ! -f "docker/build/dockerfile" ]; then
    echo "Error: Please run this script from the project root."
    echo "Usage: ./docker/push_to_ghcr.sh"
    echo "Current directory: $(pwd)"
    exit 1
fi

echo "--- Configuration ---"
echo "Owner: $IMAGE_OWNER"
echo "Image: $FULL_IMAGE_NAME"
echo "---------------------"

echo "Building Docker image..."
# Note: We build from the current directory (.) as context
docker build --platform linux/amd64 -f docker/build/dockerfile -t "$FULL_IMAGE_NAME" .

echo "Pushing to GHCR..."
echo "If this fails, ensure you are logged in:"
echo "  export CR_PAT=your_token"
echo "  echo \$CR_PAT | docker login ghcr.io -u YOUR_USERNAME --password-stdin"
echo ""

docker push "$FULL_IMAGE_NAME"

echo "Success! Image pushed to $FULL_IMAGE_NAME"
