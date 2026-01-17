<x-app-layout>
    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 text-gray-900">
                    <div class="mb-8 text-center">
                        <h1 class="text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-blue-600">
                            Uredi oglas
                        </h1>
                        <p class="text-gray-500 mt-2">Ažurirajte podatke vašeg oglasa.</p>
                    </div>

                    <form method="POST" action="{{ route('ads.update', $ad->id) }}" class="space-y-8" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Naslov oglasa')" class="text-lg font-semibold text-gray-700" />
                            <x-text-input id="title" class="block mt-2 w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50" type="text" name="title" :value="old('title', $ad->title)" placeholder="npr. Prodajem uhodan posao u centru" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Type -->
                            <div>
                                <span class="block text-lg font-semibold text-gray-700 mb-2">{{ __('Tip oglasa') }}</span>
                                <div class="flex space-x-4">
                                    <label class="flex-1 relative cursor-pointer group">
                                        <input type="radio" name="type" value="offer" class="peer sr-only" {{ old('type', $ad->type) === 'offer' ? 'checked' : '' }}>
                                        <div class="p-4 rounded-xl border-2 border-gray-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 hover:bg-gray-50 transition-all text-center">
                                            <span class="block font-bold text-gray-900 peer-checked:text-primary-700">Nudim</span>
                                        </div>
                                    </label>
                                    <label class="flex-1 relative cursor-pointer group">
                                        <input type="radio" name="type" value="demand" class="peer sr-only" {{ old('type', $ad->type) === 'demand' ? 'checked' : '' }}>
                                        <div class="p-4 rounded-xl border-2 border-gray-200 peer-checked:border-primary-500 peer-checked:bg-primary-50 hover:bg-gray-50 transition-all text-center">
                                            <span class="block font-bold text-gray-900 peer-checked:text-primary-700">Tražim</span>
                                        </div>
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('type')" class="mt-2" />
                            </div>

                            <!-- Category -->
                            <div>
                                <x-input-label for="category" :value="__('Kategorija')" class="text-lg font-semibold text-gray-700" />
                                <div class="relative mt-2">
                                    <select id="category" name="category" class="block w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50 appearance-none">
                                        @foreach (['Prodaja poslovanja', 'Partnerstva', 'Oprema i alati', 'Usluge', 'Oglasni prostor', 'Pitanja i odgovori'] as $cat)
                                            <option value="{{ $cat }}" {{ old('category', $ad->category) === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-700">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('category')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Price -->
                        <div>
                            <x-input-label for="price" :value="__('Cijena (€)')" class="text-lg font-semibold text-gray-700" />
                            <x-text-input id="price" class="block mt-2 w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50" type="number" step="0.01" name="price" :value="old('price', $ad->price)" placeholder="0.00" />
                            <p class="text-xs text-gray-500 mt-2 ml-1">Ostavite prazno za "Po dogovoru"</p>
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Detaljan opis')" class="text-lg font-semibold text-gray-700" />
                            <textarea id="description" name="description" rows="8" class="block mt-2 w-full p-4 border-gray-200 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-sm bg-gray-50" placeholder="Opišite detaljno što nudite ili tražite..." required>{{ old('description', $ad->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Images Upload -->
                        <div x-data="imageUploader({{ json_encode($ad->images ?? []) }})">
                            <x-input-label :value="__('Fotografije')" class="text-lg font-semibold text-gray-700" />
                            <p class="text-sm text-gray-500 mt-1 mb-3">Dodajte do 5 fotografija. Prva fotografija će biti naslovna.</p>
                            
                            <!-- Hidden inputs for existing images -->
                            <template x-for="(url, index) in existingImages" :key="'existing-input-' + index">
                                <input type="hidden" name="existing_images[]" :value="url">
                            </template>
                            
                            <!-- Hidden inputs for newly uploaded images -->
                            <template x-for="(image, index) in uploadedImages" :key="'uploaded-input-' + index">
                                <input type="hidden" name="uploaded_images[]" :value="image.url">
                            </template>
                            
                            <div class="mt-2">
                                <!-- Existing Images -->
                                <div class="mb-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4" x-show="existingImages.length > 0">
                                    <template x-for="(url, index) in existingImages" :key="'existing-' + index">
                                        <div class="relative group aspect-square">
                                            <img :src="url" class="w-full h-full object-cover rounded-lg border border-gray-200">
                                            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                                <button type="button" @click="removeExistingImage(index)" class="p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <span x-show="index === 0 && uploadedImages.length === 0" class="absolute top-2 left-2 px-2 py-1 bg-primary-500 text-white text-xs font-medium rounded">Naslovna</span>
                                        </div>
                                    </template>
                                </div>

                                <div 
                                    class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-primary-400 transition-colors cursor-pointer bg-gray-50"
                                    x-show="totalImages < 5"
                                    @click="$refs.fileInput.click()"
                                    @dragover.prevent="dragover = true"
                                    @dragleave.prevent="dragover = false"
                                    @drop.prevent="handleDrop($event)"
                                    :class="{ 'border-primary-500 bg-primary-50': dragover, 'opacity-50 cursor-not-allowed': uploading }"
                                >
                                    <input 
                                        type="file" 
                                        multiple 
                                        accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                                        class="hidden" 
                                        x-ref="fileInput"
                                        @change="handleFiles($event)"
                                        :disabled="uploading"
                                    >
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-600">
                                        <span class="font-medium text-primary-600">Kliknite za odabir</span> ili povucite fotografije ovdje
                                    </p>
                                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF, WEBP do 5MB</p>
                                </div>

                                <!-- Upload Progress -->
                                <div x-show="uploading" class="mt-4 p-4 bg-blue-50 rounded-xl">
                                    <div class="flex items-center gap-3">
                                        <svg class="animate-spin h-5 w-5 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        <span class="text-sm font-medium text-primary-700">Učitavanje fotografija... <span x-text="uploadProgress"></span>%</span>
                                    </div>
                                    <div class="mt-2 w-full bg-blue-200 rounded-full h-2">
                                        <div class="bg-primary-600 h-2 rounded-full transition-all duration-300" :style="'width: ' + uploadProgress + '%'"></div>
                                    </div>
                                </div>

                                <!-- New Uploaded Images -->
                                <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4" x-show="uploadedImages.length > 0">
                                    <template x-for="(image, index) in uploadedImages" :key="'uploaded-' + index">
                                        <div class="relative group aspect-square">
                                            <img :src="image.url" class="w-full h-full object-cover rounded-lg border border-gray-200">
                                            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                                <button type="button" @click="removeUploadedImage(index)" class="p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <span class="absolute top-2 left-2 px-2 py-1 bg-green-500 text-white text-xs font-medium rounded">Nova</span>
                                        </div>
                                    </template>
                                </div>

                                <!-- Error Message -->
                                <div x-show="uploadError" class="mt-4 p-3 bg-red-50 text-red-700 rounded-lg text-sm" x-text="uploadError"></div>
                            </div>
                            <x-input-error :messages="$errors->get('uploaded_images')" class="mt-2" />
                        </div>

                        <!-- Anonymous Option -->
                        <div class="flex items-center p-4 bg-gray-50 rounded-xl border border-gray-200">
                            <input id="is_anonymous" name="is_anonymous" type="checkbox" value="1" {{ old('is_anonymous', $ad->is_anonymous) ? 'checked' : '' }} class="h-5 w-5 text-primary-600 focus:ring-primary-500 border-gray-300 rounded transition duration-150 ease-in-out">
                            <div class="ml-3">
                                <label for="is_anonymous" class="font-medium text-gray-900 cursor-pointer">Objavi anonimno</label>
                                <p class="text-sm text-gray-500">Vaše ime i prezime neće biti vidljivo javnosti.</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-6 border-t border-gray-100">
                            <a href="{{ route('ads.show', $ad->id) }}" class="text-gray-600 hover:text-gray-900 font-medium">
                                ← Natrag na oglas
                            </a>
                            <x-primary-button class="px-8 py-3 text-lg rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all">
                                {{ __('Spremi promjene') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function imageUploader(existingImages = []) {
            return {
                dragover: false,
                existingImages: existingImages || [],
                uploadedImages: [],
                uploading: false,
                uploadProgress: 0,
                uploadError: '',
                
                get totalImages() {
                    return this.existingImages.length + this.uploadedImages.length;
                },
                
                handleFiles(event) {
                    const files = Array.from(event.target.files);
                    this.uploadFiles(files);
                },
                
                handleDrop(event) {
                    this.dragover = false;
                    const files = Array.from(event.dataTransfer.files).filter(f => f.type.startsWith('image/'));
                    this.uploadFiles(files);
                },
                
                async uploadFiles(files) {
                    const remaining = 5 - this.totalImages;
                    const filesToUpload = files.slice(0, remaining);
                    
                    if (filesToUpload.length === 0) return;
                    
                    this.uploading = true;
                    this.uploadProgress = 0;
                    this.uploadError = '';
                    
                    let completed = 0;
                    
                    for (const file of filesToUpload) {
                        try {
                            // Get signed URL from server
                            const response = await fetch('/upload/signed-url', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify({
                                    filename: file.name,
                                    content_type: file.type
                                })
                            });
                            
                            if (!response.ok) {
                                throw new Error('Greška pri dohvaćanju URL-a za upload');
                            }
                            
                            const { url, public_url } = await response.json();
                            
                            // Upload directly to DigitalOcean Spaces
                            const uploadResponse = await fetch(url, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': file.type,
                                    'x-amz-acl': 'public-read'
                                },
                                body: file
                            });
                            
                            if (!uploadResponse.ok) {
                                throw new Error('Greška pri uploadu fotografije');
                            }
                            
                            this.uploadedImages.push({ url: public_url });
                            completed++;
                            this.uploadProgress = Math.round((completed / filesToUpload.length) * 100);
                            
                        } catch (error) {
                            console.error('Upload error:', error);
                            this.uploadError = error.message || 'Greška pri uploadu fotografije';
                        }
                    }
                    
                    this.uploading = false;
                    this.$refs.fileInput.value = '';
                },
                
                removeExistingImage(index) {
                    this.existingImages.splice(index, 1);
                },
                
                removeUploadedImage(index) {
                    this.uploadedImages.splice(index, 1);
                }
            }
        }
    </script>
</x-app-layout>