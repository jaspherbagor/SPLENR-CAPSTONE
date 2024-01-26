<footer class="footer container-fluid px-4 pt-5 pb-3">
    <div class="row flex-wrap align-items-top justify-content-space-between pb-1">
        <div class="footer_logo col-lg-2 col-md-4 col-sm-4 col-12 text-start text-white px-2 py-2">
            <a href="/">
                <img src="{{ asset('image/login-logo.svg') }}" class="logo-img mt-4" alt="logo"/>
            </a>
        </div>
        <div class="customer_service col-lg-2 col-md-4 col-sm-4 col-12 text-white text-start px-2 py-2">
            <h5 class="fw-semibold mb-3">CUSTOMER SERVICE</h5>
            <p>
                <a href="/contact" class="text-decoration-none text-white footer_a">Contact Us</a>
            </p>
            <p>
                <a href="/FAQs" class="footer_a text-decoration-none text-white">FAQs</a>
            </p>
            <p>
                <a href="/privacy-policy" class="footer_link text-decoration-none text-white">Privacy Policy</a>
            </p>
            <p>
                <a href="/terms-and-condition" class="footer_link text-decoration-none text-white">Terms and Condition</a>
            </p>
        </div>
        <div class="quick_links col-lg-2 col-md-4 col-sm-4 col-12 text-white text-start px-2 py-2">
            <h5 class="fw-semibold mb-3">QUICK LINKS</h5>
            <p>
                <a href="/" class="footer_link text-decoration-none text-white">Home</a>
            </p>
            <p>
                <a href="/about" class="footer_link text-decoration-none text-white">About</a>
            </p>
            <p>
                <a href="/jobs" class="footer_link text-decoration-none text-white">Jobs</a>
            </p>
            <form id="form-logout" action="{{ route('logout') }}" method="post" >@csrf</form>
        </div>
        <div class="categories col-lg-2 col-md-4 col-sm-4 col-12 text-white text-start px-2 py-2">
            <h5 class="fw-semibold mb-3">For Employer</h5>
            <p>
                <a href="{{ route('create.employer') }}" class="footer_link text-decoration-none text-white">
                    Employer Register
                </a>
            </p>
            <p>
                <a href="{{ route('dashboard') }}" class="footer_link text-decoration-none text-white">Dashboard</a>
            </p>
            <p>
                <a href="{{ route('subscribe') }}" class="footer_link text-decoration-none text-white">Subscribe</a>
            </p>
        </div>
        <div class="my_account col-lg-2 col-md-4 col-sm-4 col-12 text-white text-start px-2 py-2">
            <h5 class="fw-semibold mb-3">For Job Seeker</h5>
            <p>
                <a href="{{ route('create.seeker') }}" class="footer_link text-decoration-none text-white">
                    Seeker Register
                </a>
            </p>
            <p>
                <a href="{{ route('seeker.profile') }}" class="footer_link text-decoration-none text-white">Profile</a>
            </p>
            <p>
                <a href="{{ route('job.applied') }}" class="footer_link text-decoration-none text-white">Job Applied</a>
            </p>
        </div>
        
        <div class="social_links col-lg-2 col-md-4 col-sm-4 col-12 text-white text-start px-2 py-2">
            <h5 class="fw-semibold mb-3">SOCIAL LINKS</h5>
            <div class="social_icons align-items-center justify-content-start">
                <a href="https://www.facebook.com/jas.bagor/"
                 target="_blank" class="mx-2 text-white text-decoration-none">
                    <i class="footer_link bi bi-facebook fs-4"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCTNYaiZxQGNiNLFg8VosSpw"
                 target="_blank" class="mx-2 text-white text-decoration-none">
                    <i class="footer_link bi bi-youtube fs-4"></i>
                </a>
                <a href="https://www.tiktok.com/@jasbgr" target="_blank" class="mx-2 text-white text-decoration-none">
                    <i class="footer_link bi bi-tiktok fs-4"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="footer_copyright container-fluid px-4 pt-4 mt-4 pb-0">
        <p class="text-white my-auto text-center">
            Copyright © 2024 <span class="fw-semibold">splenr</span>. All rights reserved
        </p>
    </div>
    {{-- Back to Top Button --}}
    <a href="#" id="back-to-top" class="position-fixed text-decoration-none">
        <button class="btn btn-outline-dark">
            <i class="bi bi-arrow-up-short text-white fs-5"></i>
        </button>
    </a>
</footer>
<script>
    let logout = document.getElementById('logoutbtn');
    let form = document.getElementById('form-logout');
    logout.addEventListener('click', function() {
        form.submit();
    })
</script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
