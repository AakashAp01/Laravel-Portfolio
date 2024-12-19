<div class="row justify-content-center">
    <div class="col-12 col-md-8">

        @if (session('successContact'))
            <div class="alert alert-success border border-success bg-transparent text-success fade show"
                role="alert" id="successAlert" >
                <i class="bi bi-check-circle me-2"></i>
                {{ session('successContact') }}
            </div>
        @endif

        <form wire:submit.prevent="storeContactMe">
            <!-- Name Input -->
            <div class="input-group mb-1">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username"
                    wire:model="name">
            </div>
            {{-- @error('name')
                <small class="text-color-primary d-block mb-3">{{ $message }}</small>
            @enderror --}}

            <!-- Email Input -->
            <div class="input-group mb-1">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address"
                    wire:model="email">
            </div>
            {{-- @error('email')
                <small class="text-color-primary d-block mb-3">{{ $message }}</small>
            @enderror --}}

            <!-- Subject Input -->
            <div class="input-group mb-1">
                <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                <input type="text" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject"
                    wire:model="subject">
            </div>
            {{-- @error('subject')
                <small class="text-color-primary d-block mb-3">{{ $message }}</small>
            @enderror --}}

            <!-- Message Input -->
            <div class="input-group mb-1">
                <span class="input-group-text"><i class="bi bi-chat"></i></span>
                <textarea class="form-control @error('message') is-invalid @enderror" rows="5" placeholder="Message"
                    wire:model="message"></textarea>
            </div>
            {{-- @error('message')
                <small class="text-color-primary d-block mb-3">{{ $message }}</small>
            @enderror --}}

            <!-- Submit Button -->
            <button type="submit" class="mt-2 w-100 btn btn-primary" id="contactButton">
                <span wire:loading.remove>{{ 'Submit' }}</span>
                <span wire:loading>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Processing...
                </span>
            </button>
        </form>

    </div>
</div>


