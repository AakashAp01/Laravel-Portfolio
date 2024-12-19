@extends('admin.partials.layout')

@section('title', 'AakashAP | Settings')

@section('content')

    <!-- Form Start -->
    <div class="container-fluid px-4">
        <div class="col-sm-12 col-xl-12 bg-secondary rounded">
            <div class="m-4 p-3">
                <h3 class="text-primary">Settings</h3>
            </div>
        </div>
        <div class="row g-4">
            <!-- Add Project Button -->
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Logo</h6>
                    <form action="{{ route('admin.storeLogo') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- CSRF protection -->

                        <!-- Preview Box -->
                        <div id="logoPreview" style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <img src="{{ asset('storage/' . $settings['site_logo'] ?? 'https://via.placeholder.com/300x100') }}"
                                alt="Image Preview"
                                style="display: block; width: auto; height: 100px; object-fit: cover; border: 1px dashed #ccc; border-radius: 4px;">
                        </div>

                        <!-- File Input -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Logo</label>
                            <input class="form-control bg-dark @error('logo') is-invalid @enderror" type="file"
                                name="logo" accept="image/*" onchange="previewImages(event,'logoPreview')">
                            @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Favicon</h6>
                    <form action="{{ route('admin.storeFavicon') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- CSRF protection -->

                        <!-- Preview Box -->
                        <div id="faviconPreview" style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <img src="{{ isset($settings['site_favicon']) ? asset('storage/' . $settings['site_favicon']) : 'https://via.placeholder.com/100' }}"
                                alt="Image Preview"
                                style="display: block; width: auto; height: 100px; object-fit: cover; border: 1px dashed #ccc; border-radius: 4px;">

                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Favicon</label>
                            <input class="form-control bg-dark @error('favicon') is-invalid @enderror" type="file"
                                name="favicon" accept="image/*" onchange="previewImages(event,'faviconPreview')">
                            @error('favicon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Theme Color Picker -->
                        <div class="mb-3">
                            <label for="themeColor" class="form-label">Theme Color</label>
                            <input class="form-control form-control-color bg-dark @error('theme_color') is-invalid @enderror"
                                type="color" name="theme_color" id="themeColor"
                                value="{{ $settings['theme_color'] ?? '#000000' }}">
                            @error('theme_color')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">About Profile</h6>
                    <form action="{{ route('admin.storeAboutProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- CSRF protection -->

                        <!-- Preview Box -->
                        <div id="aboutImagePreview" style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <img src="{{ asset('storage/' . $settings['site_about_profile'] ?? 'https://via.placeholder.com/100') }}"
                                alt="Image Preview"
                                style="display: block; width: auto; height: 200px; object-fit: cover; border: 1px dashed #ccc; border-radius: 4px;">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">About Profile</label>
                            <input class="form-control bg-dark  @error('about_profile') is-invalid @enderror" type="file"
                                name="about_profile" accept="image/*" onchange="previewImages(event,'aboutImagePreview')">

                            @error('about_profile')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4 d-flex justify-content-between">Font Style <span class="badge bg-primary">Current:
                            {{ $settings['font_style'] ?? '--' }}</span></h6>
                            <form action="{{ route('admin.fontStyle') }}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- CSRF protection -->

                                <!-- Font Style Input Field -->
                                <div class="mb-3">
                                    <label for="fontStyle" class="form-label text-light">Font Style</label>
                                    <input type="text"
                                           class="form-control bg-dark text-light @error('font_style') is-invalid @enderror"
                                           name="font_style"
                                           id="fontStyle"
                                           placeholder="Enter Font Style (e.g., Sono, Roboto, Montserrat)"
                                           value="{{ $settings['font_style'] ?? '' }}">

                                    @error('font_style')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Google Fonts Link Text Area -->
                                <div class="mb-3">
                                    <label for="googleFontLinks" class="form-label text-light">Google Fonts Links</label>
                                    <textarea class="form-control bg-dark text-light @error('google_font_links') is-invalid @enderror"
                                              name="google_font_links"
                                              id="googleFontLinks"
                                              rows="4"
                                              placeholder="Paste your Google Fonts link(s) here. Example: https://fonts.googleapis.com/css2?family=Sono&display=swap">{{ $settings['google_font_links'] }}</textarea>

                                    @error('google_font_links')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>


                    <h6 class="mt-4 d-flex justify-content-between">Upload Resume
                        <a href="{{ asset('storage/' . $settings['resume'] ?? 'https://via.placeholder.com/100') }}"
                            class="btn btn-primary btn-sm" download>Download <i class="fa fa-download"></i> </a>
                    </h6>
                    <form action="{{ route('admin.resume') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- CSRF protection -->



                        <div class="mb-3">
                            <input class="form-control mt-2 bg-dark @error('resume') is-invalid @enderror" type="file"
                                name="resume" accept=".pdf,.doc,.docx,.jpg,.jpeg">

                            @error('resume')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>
            </div>


            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Social Links</h6>
                    <form action="{{ route('admin.storeSocialLinks') }}" method="POST">
                        @csrf <!-- CSRF protection -->

                        <!-- LinkedIn -->
                        <div class="row mb-3">
                            <label for="inputLinkedIn" class="col-sm-2 col-form-label"><i class="bi bi-linkedin"></i>
                                LinkedIn</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control @error('linkedin') is-invalid @enderror"
                                    name="linkedin" id="inputLinkedIn" placeholder="Enter LinkedIn profile URL"
                                    value="{{ $settings['linkedin'] ?? '' }}">
                                <!-- Show error message for LinkedIn in a small tag -->
                                @error('linkedin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Facebook -->
                        <div class="row mb-3">
                            <label for="inputFacebook" class="col-sm-2 col-form-label"><i class="bi bi-facebook"></i>
                                Facebook</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                                    name="facebook" id="inputFacebook" placeholder="Enter Facebook profile URL"
                                    value="{{ $settings['facebook'] ?? '' }}">
                                <!-- Show error message for Facebook in a small tag -->
                                @error('facebook')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Instagram -->
                        <div class="row mb-3">
                            <label for="inputInstagram" class="col-sm-2 col-form-label"><i class="bi bi-instagram"></i>
                                Instagram</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control @error('instagram') is-invalid @enderror"
                                    name="instagram" id="inputInstagram" placeholder="Enter Instagram profile URL"
                                    value="{{ $settings['instagram'] ?? '' }}">
                                <!-- Show error message for Instagram in a small tag -->
                                @error('instagram')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="row mb-3">
                            <label for="inputWhatsApp" class="col-sm-2 col-form-label"><i class="bi bi-whatsapp"></i>
                                WhatsApp</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control @error('whatsapp') is-invalid @enderror"
                                    name="whatsapp" id="inputWhatsApp"
                                    placeholder="Enter WhatsApp number (e.g., +919XXXXXXXXX)"
                                    value="{{ $settings['whatsapp'] ?? '' }}">
                                <!-- Show error message for WhatsApp in a small tag -->
                                @error('whatsapp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Twitter -->
                        <div class="row mb-3">
                            <label for="inputTwitter" class="col-sm-2 col-form-label"><i class="bi bi-twitter"></i>
                                Twitter</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control @error('twitter') is-invalid @enderror"
                                    name="twitter" id="inputTwitter" placeholder="Enter Twitter profile URL"
                                    value="{{ $settings['twitter'] ?? '' }}">
                                <!-- Show error message for Twitter in a small tag -->
                                @error('twitter')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- GitHub -->
                        <div class="row mb-3">
                            <label for="inputGitHub" class="col-sm-2 col-form-label"><i class="bi bi-github"></i>
                                GitHub</label>
                            <div class="col-sm-10">
                                <input type="url" class="form-control @error('github') is-invalid @enderror"
                                    name="github" id="inputGitHub" placeholder="Enter GitHub profile URL"
                                    value="{{ $settings['github'] ?? '' }}">
                                <!-- Show error message for GitHub in a small tag -->
                                @error('github')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Save Links</button>
                    </form>

                </div>
            </div>

            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">API Keys</h6>
                    <form action="{{ route('admin.storeApis') }}" method="POST">
                        @csrf <!-- CSRF protection -->

                        <!-- Tiny Editor -->
                        <div class="row mb-3">
                            <label for="inputLinkedIn" class="col-sm-2 col-form-label"><i class="bi bi-key-fill"></i>
                                Tiny Editor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('tiny_editor_api') is-invalid @enderror"
                                    name="tiny_editor_api" id="inputLinkedIn" placeholder="Enter tiny editor api key"
                                    value="{{ $settings['tiny_editor_api'] ?? '' }}">

                                @error('tiny_editor_api')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Save Keys</button>

                    </form>

                </div>
            </div>
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Email Credentials</h6>

                    <form action="{{ route('admin.storeEmailCredentials') }}" method="POST">
                        @csrf <!-- CSRF protection -->

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <!-- SMTP Server -->
                                <div class="mb-3">
                                    <label for="smtpServer" class="form-label">SMTP Server</label>
                                    <input class="form-control @error('smtp_server') is-invalid @enderror" type="text"
                                        name="smtp_server" id="smtpServer"
                                        value="{{ old('smtp_server', $settings['smtp_server'] ?? '') }}">
                                    @error('smtp_server')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- SMTP Port -->
                                <div class="mb-3">
                                    <label for="smtpPort" class="form-label">SMTP Port</label>
                                    <input class="form-control @error('smtp_port') is-invalid @enderror" type="number"
                                        name="smtp_port" id="smtpPort"
                                        value="{{ old('smtp_port', $settings['smtp_port'] ?? '') }}">
                                    @error('smtp_port')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Email Username -->
                                <div class="mb-3">
                                    <label for="smtpUsername" class="form-label">Email Username</label>
                                    <input class="form-control @error('smtp_username') is-invalid @enderror"
                                        type="email" name="smtp_username" id="smtpUsername"
                                        value="{{ old('smtp_username', $settings['smtp_username'] ?? '') }}">
                                    @error('smtp_username')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- From Email Address -->
                                <div class="mb-3">
                                    <label for="fromEmail" class="form-label">From Email Address</label>
                                    <input class="form-control @error('from_email') is-invalid @enderror" type="email"
                                        name="from_email" id="fromEmail"
                                        value="{{ old('from_email', $settings['from_email'] ?? '') }}">
                                    @error('from_email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <!-- Encryption -->
                                <div class="mb-3">
                                    <label for="smtpEncryption" class="form-label">Encryption</label>
                                    <select class="form-control bg-dark @error('smtp_encryption') is-invalid @enderror"
                                        name="smtp_encryption" id="smtpEncryption">
                                        <option value="tls"
                                            {{ old('smtp_encryption', $settings['smtp_encryption'] ?? '') == 'tls' ? 'selected' : '' }}>
                                            TLS
                                        </option>
                                        <option value="ssl"
                                            {{ old('smtp_encryption', $settings['smtp_encryption'] ?? '') == 'ssl' ? 'selected' : '' }}>
                                            SSL
                                        </option>
                                        <option value="none"
                                            {{ old('smtp_encryption', $settings['smtp_encryption'] ?? '') == 'none' ? 'selected' : '' }}>
                                            None
                                        </option>
                                    </select>
                                    @error('smtp_encryption')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Email Password -->
                                <div class="mb-3">
                                    <label for="smtpPassword" class="form-label">Email Password</label>
                                    <input class="form-control @error('smtp_password') is-invalid @enderror"
                                        type="text" name="smtp_password" id="smtpPassword"
                                        value="{{ old('smtp_password', $settings['smtp_password'] ?? '') }}">
                                    @error('smtp_password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- From Name -->
                                <div class="mb-3">
                                    <label for="fromName" class="form-label">From Name</label>
                                    <input class="form-control @error('from_name') is-invalid @enderror" type="text"
                                        name="from_name" id="fromName"
                                        value="{{ old('from_name', $settings['from_name'] ?? '') }}">
                                    @error('from_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Save Settings</button>
                        <a href="{{ route('admin.sendTestEmail') }}" class="btn btn-success">
                            Test <i class="fas fa-paper-plane"></i>
                        </a>
                    </form>
                </div>
            </div>


            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">About Section Content</h6>
                    <form action="{{ route('admin.storeAboutContent') }}" method="POST">
                        @csrf <!-- CSRF protection -->

                        <div class="mb-3">
                            <textarea name="aboutContent" id="content" rows="10"
                                class="form-control @error('aboutContent') is-invalid @enderror">{{ $settings['about_content'] ?? '' }}</textarea>

                            <!-- Show error message for About Content -->
                            @error('aboutContent')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </form>
                </div>
            </div>




            {{-- <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">File Input</h6>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control bg-dark" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                        <input class="form-control bg-dark" type="file" id="formFileMultiple" multiple>
                    </div>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Small file input example</label>
                        <input class="form-control form-control-sm bg-dark" id="formFileSm" type="file">
                    </div>
                    <div>
                        <label for="formFileLg" class="form-label">Large file input example</label>
                        <input class="form-control form-control-lg bg-dark" id="formFileLg" type="file">
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Select</h6>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <select class="form-select" multiple aria-label="multiple select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Check, Radio & Switch</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Checked checkbox
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
                        <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                    </div>
                    <hr>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Default radio
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Default checked radio
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                            value="option1">
                        <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                            value="option2">
                        <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                            value="option3" disabled>
                        <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                    </div>
                    <hr>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox
                            input</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked"
                            checked>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox
                            input</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDisabled"
                            disabled>
                        <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox
                            input</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch"
                            id="flexSwitchCheckCheckedDisabled" checked disabled>
                        <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked
                            switch checkbox input</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Input Group</h6>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>
                    <label for="basic-url" class="form-label">Your vanity URL</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <span class="input-group-text">.00</span>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                        <span class="input-group-text">@</span>
                        <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">With textarea</span>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Sizing</h6>
                    <input class="form-control form-control-lg mb-3" type="text" placeholder=".form-control-lg"
                        aria-label=".form-control-lg example">
                    <input class="form-control mb-3" type="text" placeholder="Default input"
                        aria-label="default input example">
                    <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm"
                        aria-label=".form-control-sm example">
                </div>
            </div> --}}
        </div>
    </div>
    <!-- Form End -->
@endsection
