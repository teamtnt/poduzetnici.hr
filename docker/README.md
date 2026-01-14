# Docker Instructions

## Prerequisites

### 1. GitHub Personal Access Token (PAT)
To push to the GitHub Container Registry (GHCR), you need a Personal Access Token (PAT).

1. Go to [GitHub Developer Settings > Personal access tokens > Tokens (classic)](https://github.com/settings/tokens).
2. Generate a new token.
3. Select the `write:packages` scope (this will also select `repo` and `read:packages`).
4. Copy the token.

### 2. Login to GHCR
Run the following command in your terminal (replace `YOUR_TOKEN` and `YOUR_USERNAME`):

```bash
export CR_PAT=YOUR_TOKEN
echo $CR_PAT | docker login ghcr.io -u YOUR_USERNAME --password-stdin
```

## Building and Pushing

We have provided a helper script `docker/push_to_ghcr.sh` to automate this.

### Usage

Run from the project root:

```bash
chmod +x docker/push_to_ghcr.sh
./docker/push_to_ghcr.sh
```

### Customization

You can override the default configuration by setting environment variables:

```bash
IMAGE_OWNER=nenad IMAGE_NAME=myapp ./docker/push_to_ghcr.sh
```

### Pushing to a GitHub Organization

If you are pushing to a **GitHub Organization** instead of your personal account:

1.  Ensure you have `write:packages` access to the organization.
2.  Set `IMAGE_OWNER` to the organization name.

```bash
IMAGE_OWNER=my-organization-name ./docker/push_to_ghcr.sh
```

The image will be pushed to `ghcr.io/my-organization-name/poduzetnici:latest`.

## Manual Commands

If you prefer running commands manually:

1.  **Build**:
    ```bash
    docker build -f docker/build/dockerfile -t ghcr.io/nticaric/poduzetnici:latest .
    ```
    *Note: Must be run from the project root.*

2.  **Push**:
    ```bash
    docker push ghcr.io/nticaric/poduzetnici:latest
    ```
