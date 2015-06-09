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


      <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a href="#monthly"
               aria-controls="monthly"
               role="tab" data-toggle="tab">Monthly Subscriptions</a>
          </li>
          <li role="presentation">
            <a href="#quantity"
               aria-controls="profile"
               role="tab" data-toggle="tab">
              Non Subscription Purchase
            </a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="monthly">
            @include('stripe.monthly')
          </div>
          <div role="tabpanel" class="tab-pane" id="quantity">
            @include('stripe.quantity')
          </div>
        </div>

      </div>



    </div><!-- /.container -->


     @include('footer')
  </body>
</html>
