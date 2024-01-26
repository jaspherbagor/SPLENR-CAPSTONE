@extends('layouts.app')

@section('content')
    <!--FAQS-->
    <div class="container justify-content-center pt-4 px-4 mt-5">
        <h2 class="mt-5 mb-3 fw-bolder text-center">FREQUENTLY ASKED QUESTIONS (FAQ'S)</h2>
        <p class=" mt-3 text-center">
            Find the answers to your most common questions about splenr's job listing platform,
            providing opportunities for both job seekers and employers in the industry.
        </p>
    </div>
    <section class="tab-class px-2 text-center">
        <ul class="nav nav-pills mb-3 mt-5 d-flex justify-content-center align-items-center px-4">
            <li class="nav-item text-center">
                <a class="d-flex align-items-center text-start pb-3 active text-decoration-none text-black"
                 data-bs-toggle="pill" href="#general">
                    <button class="btn btn-dark fw-semibold">General Inquiries</button>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center text-start mx-3 me-0 pb-3 text-decoration-none text-black"
                 data-bs-toggle="pill" href="#jobseekers">
                    <button class="btn btn-dark fw-semibold">Job Seeker FAQs</button>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center text-start mx-3 me-0 pb-3 text-decoration-none text-black"
                 data-bs-toggle="pill" href="#employer">
                    <button class="btn btn-dark fw-semibold">Employer FAQs</button>
                </a>
            </li>
        </ul>

        <!-- General Inquiry FAQ -->
        <div class="container-fluid px-4 pb-4">
            <div class="tab-content px-md-5">
                <div id="general" class="tab-pane fade show p-0 active">
                    <h4 class="fw-bold text-center mb-4">GENERAL INQUIRIES</h4>
                    <div id="accordion" class="accordion-style">

                        <!-- FAQ 1 -->
                        <div class="card mb-3">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed text-decoration-none
                                     text-dark fw-semibold" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false"
                                        aria-controls="collapseOne">
                                        Q. How does splenr's job portal work, and how can employers
                                         and job seekers benefit from using it?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-bs-parent="#accordion">
                                <div class="card-body">
                                    <p class="text-start my-0 py-0">
                                    Splenr's job portal connects employers and job seekers by
                                    allowing employers to post job vacancies and job seekers to
                                    search for available job opportunities. This platform
                                    simplifies the hiring process for employers and provides job
                                    seekers with a convenient way to find relevant job
                                    opportunities. Employers can quickly find qualified candidates,
                                    and job seekers can discover jobs that match their skills and interests.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="card mb-3">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed fw-semibold text-dark text-decoration-none"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                        Q.How can employers post job vacancies on splenr's job
                                        portal, and what information should
                                        they include?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordion">
                                <div class="card-body">
                                    <p class="text-start">
                                        Employers can create an account on splenr's job portal and
                                        post job vacancies by filling in the necessary details in the
                                        job posting form. Important information to include is the job
                                        title, job description, roles & responsibilities, location,
                                        salary, job type, and required skills or qualifications. By
                                        providing detailed job requirements, employers can attract
                                        suitable candidates and streamline the hiring process.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="card mb-3">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed fw-semibold
                                    text-decoration-none text-dark" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                        Q. How can job seekers search for job opportunities on
                                        splenr's job portal, and what features does the platform offer?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordion">
                                <div class="card-body">
                                    <p class="text-start">
                                        Job seekers can browse job opportunities on splenr's job
                                        portal by creating an account, selecting their desired job
                                        category and location, and browsing through the available job
                                        postings. The platform offers various features, such as
                                        filters to narrow down search results and the option to apply
                                        for jobs directly through the platform. This makes it easy
                                        for job seekers to find and apply for relevant job
                                        opportunities quickly and efficiently.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="card mb-3">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed text-decoration-none text-dark fw-semibold"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                    aria-expanded="false" aria-controls="collapseFour">
                                        Q. How does splenr ensure the quality of job postings and
                                        candidates on its job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordion">
                                <div class="card-body">
                                    <p class="text-start">
                                        Splenr's job portal ensures the quality of job postings and
                                        candidates by verifying each employer and job seeker account
                                        and reviewing each job posting before it goes live on
                                        the platform.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="card mb-3">
                            <div class="card-header" id="headingFive">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed fw-semibold text-decoration-none text-dark"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                    aria-expanded="false" aria-controls="collapseFive">
                                        Q. How can employers and job seekers use splenr's job portal to
                                        build connections and enhance their recruitment and career growth?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordion">
                                <div class="card-body">
                                   <p class="text-start">
                                        Splenr's job portal offers a straightforward and efficient way
                                        for employers and job seekers to connect, build relationships,
                                        and enhance their recruitment and career growth. By actively
                                        using the platform and providing valuable contributions, employers
                                        and job seekers can establish a positive reputation and attract
                                        more opportunities or high-quality candidates. splenr's platform
                                        fosters the potential for long-term connections and success for
                                        both employers and job seekers.
                                   </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Job Seeker FAQs -->
        <div class="container-fluid px-4 pb-4">
            <div class="tab-content px-md-5">
                <div id="jobseekers" class="tab-pane fade show p-0">
                    <div id="accordion1" class="accordion-style">
                        <h4 class="fw-bold mb-4">JOB SEEKER FREQUENTLY ASKED QUESTIONS</h4>

                        <!-- FAQ 1 -->
                        <div class="card mb-3">
                            <div class="card-header" id="heading1">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed fw-semibold text-decoration-none text-black"
                                    data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false"
                                    aria-controls="collapse1">
                                        Q. How do I create a job seeker account on splenr's job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse1" class="collapse" aria-labelledby="heading1"
                                data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="text-start">
                                        To create a job seeker account on splenr's job portal, visit the splenr website
                                        and click the "Job Seeker" or "Login" header menu. Select "Job Seeker" and click
                                        the "Create an account" link below the form. Provide your name, email address,
                                        and a password. Once your account is created, you can start browsing job
                                        postings and applying for positions that match your skills and experience.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="card mb-3">
                            <div class="card-header" id="heading2">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed text-decoration-none fw-semibold text-black"
                                    data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                                    aria-controls="collapse2">
                                        Q. How do I search for job opportunities on splenr's job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="heading2"
                                data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="text-start">
                                        To search for job opportunities on splenr's job portal, log in to your account
                                        and select the job category and location you're interested in. You can browse
                                        through available job postings or use filters to narrow down your search
                                        results. Once you find a job you're interested in, you can apply directly
                                        through the platform.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="card mb-3">
                            <div class="card-header" id="heading3">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed text-decoration-none fw-semibold text-black"
                                    data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false"
                                    aria-controls="collapse3">
                                        Q. How can I apply for jobs on splenr's job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="heading3"
                                data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="text-start">
                                        To apply for jobs on splenr's job portal, click on the job posting
                                        you're interestedin, review the requirements and details, and click
                                        the "Apply Now"button and upload a resume.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="card mb-3">
                            <div class="card-header" id="heading4">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed text-decoration-none text-black fw-semibold"
                                    data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false"
                                    aria-controls="collapse4">
                                        Q. How do I communicate with employers on splenr's job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse4" class="collapse" aria-labelledby="heading4"
                                data-bs-parent="#accordion1">
                                <div class="card-body">
                                    <p class="text-start">
                                        As of now, there is no messaging system present in the platform.
                                        For further update, the platform is aiming to have a messaging system to
                                        communicate and respond directly the employer.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="card mb-3">
                            <div class="card-header" id="heading5">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed text-decoration-none fw-semibold text-black"
                                    data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false"
                                    aria-controls="collapse4">
                                        Q. How do I know that I have been shortlisted by the employer?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse5" class="collapse" aria-labelledby="heading5"
                                data-bs-parent="#accordion1">
                                <div class="card-body" style="text-align: justify;">
                                    <p class="text-start">
                                        You will know that you have been shortlisted through an email that will be
                                        sent toyou saying that you have been shortlisted in a specific position that
                                        you have applied.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Employer FAQs -->
        <div class="container-fluid px-4 pb-4">
            <div class="tab-content px-md-5">
                <div id="employer" class="tab-pane fade show p-0">
                    <div id="accordion2" class="accordion-style">
                        <h4 class="fw-bold mb-4 mt-0">EMPLOYER FREQUENTLY ASKED QUESTIONS
                        </h4>

                        <div class="card mb-3">
                            <div class="card-header" id="heading6">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed fw-semibold text-decoration-none text-black"
                                    data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false"
                                    aria-controls="collapse6">
                                        Q. How do I create a employer account on splenr's job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse6" class="collapse" aria-labelledby="heading6"
                                data-bs-parent="#accordion2">
                                <div class="card-body">
                                    <p class="text-start">
                                        To create an employer account on splenr's job portal, visit the splenr
                                        website, click on the "Employer" option in the "Login/Register" header
                                        menu, and then click the green "Create an account" link below the form.
                                        Provide your name, email address, and a password to create your account.
                                        Once registered, you can start posting job opportunities and connecting
                                        with job seekers.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header" id="heading7">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed fw-semibold text-decoration-none text-black"
                                    data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false"
                                    aria-controls="collapse7">
                                            Q. How do I post a job opportunity on splenr's job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse7" class="collapse" aria-labelledby="heading7"
                                data-bs-parent="#accordion2">
                                <div class="card-body">
                                    <p class="text-start">
                                        To post a job opportunity on splenr's job portal, log in to your
                                        employer account and click the "Create Job" button on your dashboard
                                        sidebar. Fill in details such as the job title, description, location, job type,
                                        roles and responsibilities, salary, and closing date.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header" id="heading9">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed fw-semibold text-decoration-none text-black"
                                    data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false"
                                    aria-controls="collapse9">
                                        Q. How can I communicate with job seekers on splenr's job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse9" class="collapse" aria-labelledby="heading9"
                                data-bs-parent="#accordion2">
                                <div class="card-body">
                                    <p class="text-start">
                                        You can communicate with job seekers on splenr's job portal through
                                        external means as the platform does not currently have a built-in
                                        messaging system. When you receive an application for a job posting, you
                                        can review the job seeker's profile and application. Initiate
                                        communication by sending them a message through your preferred external
                                        communication channel.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header" id="heading10">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed fw-semibold text-decoration-none text-black"
                                    data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false"
                                    aria-controls="collapse10">
                                        Q. Is there a trial period for posting jobs on splenr's job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse10" class="collapse" aria-labelledby="heading10"
                                data-bs-parent="#accordion2">
                                <div class="card-body">
                                    <p class="text-start">
                                        Yes, splenr's job portal offers a one-week trial period for posting
                                        jobs. During this trial period, you can post job opportunities for free.
                                        Once the trial period expires, you can choose to subscribe for continued
                                        access. Subscription options include weekly for Php500, monthly for
                                        Php1500, and yearly for Php10000.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header" id="heading11">
                                <h5 class="mb-0 text-start">
                                    <button class="btn btn-link collapsed fw-semibold text-decoration-none text-black"
                                    data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false"
                                    aria-controls="collapse11">
                                        Q. Is there a review and rating system for employers and job seekers on
                                        splenr's job portal?
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse11" class="collapse" aria-labelledby="heading11"
                                data-bs-parent="#accordion2">
                                <div class="card-body">
                                    <p class="text-start">
                                        No, currently, splenr's job portal does not have a review and rating
                                        system for employers and job seekers. The platform focuses on connecting
                                        employers with job seekers through job postings and applications. Any
                                        future updates or changes to the platform's features will be
                                        communicated to users accordingly.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
    @include('layouts.footer')
@endsection
