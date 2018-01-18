<section class="bg-white relative z1">

   <div class="container px4 py6 text-center display-none md-block">

      <div class="clearfix mxn4 flex">

         <div class="col col-12 md-col-6 px4 border-right border-smoke">
            <h2 class="h2 opacity-3 mb2"><i class="fa fa-phone"></i></h2>
            <h4 class="h3">Call us</h4>
            <p><?php echo get_field('global_call_us', 'option') ?></p>
            <a href="tel:<?php echo get_field('global_call_us_number', 'option') ?>" class="h2 primary bold lh1" tel="<?php echo get_field('global_call_us_number', 'option') ?>"><?php echo get_field('global_call_us_number', 'option') ?></a>
         </div>

         <div class="col col-12 md-col-6 px4">
            <h2 class="h2 opacity-3 mb2"><i class="fa fa-envelope-o"></i></h2>
            <h4 class="h3">Email us</h4>
            <p><?php echo get_field('global_email_us', 'option') ?></p>
            <a href="<?php echo get_field('global_email_us_email', 'option') ?>" class="btn btn-primary">send email</a>
         </div>

      </div>

   </div>

</section>
