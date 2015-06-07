<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
      <link href="/css/pricing-tables.css" rel="stylesheet">

      <link href="/css/bootstrap-dark.css" rel="stylesheet">

    <![endif]-->
  </head>

  <body>

  @include('nav')

    <div class="container">
        @include('errors')

      <div class="pricing-tables">

        <div class="row">
          <div class="col-sm-4 col-md-4">
              <div class="plan">

                  <div class="head">
                      <h2>2 Shows a Month</h2>

                  </div>

                  <ul class="item-list">
                      <li>2 min segment</li>
                      <li>We talk from experience</li>
                      <li>Happens at the start of the show</li>
                  </ul>

                  <div class="price">
                      <h3><span class="symbol">$</span>400</h3>
                      <h4>per month</h4>
                  </div>

                  <form action="/sponsor/2show" method="POST">
                      <script
                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                              data-key="{{ $public_key }}"
                              data-amount="40000"
                              data-name="Sponsor Shows"
                              data-description="2 Shows a Month ($200.00)"
                              data-image="/128x128.png">
                      </script>
                  </form>

              </div>
          </div>


          <div class="col-sm-4 col-md-4 ">
              <div class="plan">

                  <div class="head">
                      <h2>1 Show a Month</h2>

                  </div>

                  <ul class="item-list">
                      <li>2 min segment</li>
                      <li>We talk from experience</li>
                      <li>Happens at the start of the show</li>
                  </ul>

                  <div class="price">
                      <h3><span class="symbol">$</span>200</h3>
                      <h4>per month</h4>
                  </div>

                  <form action="/sponsor/1show" method="POST">
                      <script
                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                              data-key="{{ $public_key }}"
                              data-amount="20000"
                              data-name="Sponsor Shows"
                              data-description="1 Show a Month ($200.00)"
                              data-image="/128x128.png">
                      </script>
                  </form>

              </div>
          </div>


          <div class="col-sm-4 col-md-4  ">
              <div class="plan">

                  <div class="head">
                      <h2>Fan of the PodCast</h2>

                  </div>

                  <ul class="item-list">
                      <li>0 min segment :)</li>
                      <li>We still talk from experience</li>
                      <li>Happens through out the show</li>
                  </ul>

                  <div class="price">
                      <h3><span class="symbol">$</span>1</h3>
                      <h4>per month</h4>
                  </div>

                  <form action="/sponsor/fan" method="POST">
                      <script
                              src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                              data-key="{{ $public_key }}"
                              data-amount="100"
                              data-name="Fam"
                              data-description="Fan ($1.00)"
                              data-image="/128x128.png">
                      </script>
                  </form>

              </div>

          </div>

        </div> <!-- row-->

      </div> <!-- pricing-tables -->



    </div><!-- /.container -->


     @include('footer')
  </body>
</html>
