<?php
/**
 * Template Name: Jobs – Single
 *
 * TODO: Needs converting to single when CPT has been added.
 */
get_header(); ?>

<div class="clearfix ||  mt6" id="single-job">

    <div class="container">

        <div class="col col-12 md-col-8 lg-col-8 || pt3">

            <h1 class="h1 mb2 bold">Assistant Accountant (Interim)</h1>
            <h2 class="h3">Chorley <span class="muted">|</span> Job ID: CMRAcc03 <span class="muted">|</span> £20000 - £30000 per annum</h2>

            <p>{{ Share Options }}</p>
        </div>

        <div class="col col-12 md-col-4 lg-col-4 || text-right || pt5">

            <a href="#apply" class="btn block btn-primary btn-medium">Apply Now</a>
            <p class="mt4 bold">Expiry Date: 31st January, 18</p>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 clearfix || first-bold">

            <hr class="my4">

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fermentum volutpat condimentum. Morbi quis feugiat elit. Vivamus viverra efficitur elementum. Proin commodo finibus lacus, a pharetra justo viverra et. Duis id rutrum velit. Fusce nibh ipsum, placerat.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fermentum volutpat condimentum. Morbi quis feugiat elit. Vivamus viverra efficitur elementum. Proin commodo finibus lacus, a pharetra justo viverra et. Duis id rutrum velit. Fusce nibh ipsum, placerat.</p>

            <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit:</strong></p>

            <ul>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
            </ul>

            <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit:</strong></p>

            <ul>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet.</li>
            </ul>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras fermentum volutpat condimentum. Morbi quis feugiat elit. Vivamus viverra efficitur elementum. Proin commodo finibus lacus, a pharetra justo viverra et. Duis id rutrum velit. Fusce nibh ipsum, placerat.</p>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 clearfix || pt3 p5 mt5 bg-smoke" id="apply">

            <h3>Apply for this job</h3>

            <div class="col col-12 md-col-8">
                {{ APPLY NOW FORM }}
            </div>

            <div class="col col-12 md-col-4">

                <h4 class="h4">What happens next?</h4>
                <ol class="pl3">
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                </ol>

                <h4 class="h4 || mt5">Not ready to apply?</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                <div class="col col-12 md-col-4 || pr4">

                    <div class="image-holder img-top img-100 img-s10" style="background-image: url('https://www.idyllwildarts.org/wp-content/uploads/2016/09/blank-profile-picture.jpg');"></div>

                </div>

                <div class="col col-12 md-col-8">

                    <p class="mb1"><strong>Speak to Jack Mellor</strong></p>
                    <p>Sales Directory</p>

                    <p class="mb1">T: 01254 239363</p>
                    <p class="mb1">M: 07921 586 734</p>

                </div>


            </div>

        </div>

        <div class="col col-12 md-col-12 lg-col-12 clearfix || py2 || text-right">

            <p class="h6">Why not tell a friend or colleague about this role and you could earn £100? <i class="fa fa-question-circle"></i> {{Social Sharing}}</p>

        </div>

    </div>

    <?php include(get_template_directory() .'/template-parts/building-blocks.php' ); ?>

</div>

<?php get_footer(); ?>