<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Interview Task</title>
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="<?= base_url('public/assets/media/logos/favicon.ico') ?>"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <link href="<?= base_url('public/assets/plugins/global/plugins.bundle.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= base_url('public/assets/css/style.bundle.css') ?>" rel="stylesheet" type="text/css"/>
</head>
<body id="kt_body"  class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if ( document.documentElement ) {
            if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if ( localStorage.getItem("data-bs-theme") !== null ) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }			
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }            
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <style>
            body {
                background-image: url('<?= $backgroundImage; ?>');
            }
            [data-bs-theme="dark"] body {
                background-image: url('<?= $backgroundImage; ?>'); 
            }
        </style>
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= base_url('public/assets/media/auth/agency.png') ?>" alt=""/>    
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="<?= base_url('public/assets/media/auth/agency-dark.png') ?>" alt=""/>
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>         
                    <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post, <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve interviewed <br/> and provides some background information about <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a> and their <br/> work following this is a transcript of the interview.</div>
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                            <form class="form w-100" action = "<?= base_url('/authenticate') ?>" method="post">
                                <?= csrf_field() ?>
                                <div class="text-center mb-11">
                                    <h1 class="text-dark fw-bolder mb-3">Log In</h1>
                                    <div class="text-gray-500 fw-semibold fs-6">Your Social Campaigns</div>
                                </div>
                                <div class="row g-3 mb-9">
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100"><img alt="Logo" src="<?= base_url('public/assets/media/svg/brand-logos/google-icon.svg') ?>" class="h-15px me-3"/>Login in with Google</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                                            <img alt="Logo" src="<?= base_url('public/assets/media/svg/brand-logos/apple-black.svg') ?>" class="theme-light-show h-15px me-3"/>
                                            <img alt="Logo" src="<?= base_url('public/assets/media/svg/brand-logos/apple-black-dark.svg') ?>" class="theme-dark-show h-15px me-3"/>     
                                            Sign in with Apple
                                        </a>
                                    </div>
                                </div>
                                <div class="separator separator-content my-14">
                                    <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
                                </div>
                                <div class="fv-row mb-8">
                                    <input type="text" placeholder="Enter Email" name="email" autocomplete="off" class="form-control bg-transparent"/> 
                                </div>
                                <div class="fv-row mb-3">    
                                    <input type="password" placeholder="Enter Password" name="password" autocomplete="off" class="form-control bg-transparent"/>
                                </div>
                                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                    <div></div>
                                    <a href="#" class="link-primary">Forgot Password ?</a>
                                </div>
                                <div class="d-grid mb-10">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('public/assets/plugins/global/plugins.bundle.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/scripts.bundle.js') ?>"></script>
</body>
</html>