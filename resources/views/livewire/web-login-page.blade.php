<section class="contact-section min-vh-100">
    <div class="container">
        <h2 class="text-color-primary display-6">{{ $isLogin ? 'Login' : 'Register' }}</h2>
        <hr>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                @if (session('error'))
                    <div class="alert alert-danger border border-danger bg-transparent text-danger fade show"
                        role="alert">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        {{ session('error') }}
                    </div>
                @endif
                <form wire:submit.prevent="{{ $isLogin ? 'login' : 'register' }}">
                    @if (!$isLogin)
                        <div class="mb-3">
                            <div class="input-group">
                                <span class="input-group-text text-white"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Username" wire:model="name">
                            </div>
                            @error('name')
                            <div class="text-end">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                    @endif

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text text-white"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email Address" wire:model="email">
                        </div>
                        @error('email')
                        <div class="text-end">
                            <small class="text-danger">{{ $message }}</small>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                placeholder="Password" wire:model="password">
                        </div>
                        @error('password')
                            <div class="text-end">
                                <small class="text-danger">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100"
                        wire:target="{{ $isLogin ? 'login' : 'register' }}" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="{{ $isLogin ? 'login' : 'register' }}">
                            {{ $isLogin ? 'Login' : 'Register' }}
                        </span>
                        <span wire:loading wire:target="{{ $isLogin ? 'login' : 'register' }}">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Processing...
                        </span>
                    </button>
                </form>

                <div class="text-center mt-5">
                    <p>
                        {{ $isLogin ? "Don't have an account?" : 'Already have an account?' }}
                        <a href="javascript:void(0);" wire:click="toggle" class="text-color-primary">
                            {{ $isLogin ? 'Register here' : 'Login here' }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

