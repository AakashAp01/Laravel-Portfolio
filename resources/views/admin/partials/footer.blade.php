
<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
             <a href="{{route('admin.dashboard')}}">Aakash | AP </a>
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                <a href="{{$settings['linkedin'] ?? ''}}" target="_blank" class="mx-2">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="{{$settings['github'] ?? ''}}" target="_blank" class="mx-2">
                    <i class="bi bi-github"></i>
                </a>
                <a href="{{$settings['instagram'] ?? ''}}" target="_blank" class="mx-2">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="https://wa.me/{{$settings['whatsapp'] ?? ''}}" target="_blank" class="mx-2">
                    <i class="bi bi-whatsapp"></i>
                </a>
            </div>

        </div>
    </div>
</div>
<!-- Footer End -->
