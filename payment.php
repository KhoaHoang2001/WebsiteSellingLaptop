<!DOCTYPE html>
<html lang="en">
<?php include('./includes/head.php')?>

  <body>
   <!-- header -->
   <?php include('./includes/header.php')?>
    <!-- payment page-->
    <section id="payment" class="privacy">
      <div class="container">
        <!-- tittle heading -->
        <h2 id="payment-title" class="text-center">
          <b><span>T</span>hanh toán</b>
        </h2>
        <!-- //tittle heading -->
        <div id="checkout-center">
          <!--Horizontal Tab-->
          <div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1" id="myDIV">
              <!-- <li id="payment-card">Credit/Debit</li> -->
              <!-- <li id="payment-paypal">Paypal Account</li> -->
            </ul>
            <div class="resp-tabs-container hor_1">
              <div id="card-creditOrDebit">
                <form
                id="payment-card-form"
                  action="#"
                  method="post"
                  class="creditly-card-form agileinfo_form"
                >
                  <div class="creditly-wrapper wthree, w3_agileits_wrapper">
                    <div class="credit-card-wrapper">
                      <div class="first-row form-group">
                        <div class="controls">
                          <label class="control-label">Tên chủ thẻ</label>
                          <input
                            class="billing-address-name form-control"
                            type="text"
                            name="name"
                            placeholder="Nguyễn Văn A"
                          />
                        </div>
                        <div class="w3_agileits_card_number_grids my-3">
                          <div class="w3_agileits_card_number_grid_left">
                            <div class="controls">
                              <label class="control-label">Card Number</label>
                              <input
                                class="number credit-card-number form-control"
                                type="text"
                                name="number"
                                inputmode="numeric"
                                autocomplete="cc-number"
                                autocompletetype="cc-number"
                                x-autocompletetype="cc-number"
                                placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;"
                              />
                            </div>
                          </div>
                          <div class="w3_agileits_card_number_grid_right mt-2">
                            <div class="controls">
                              <label class="control-label">CVV</label>
                              <input
                                class="security-code form-control"
                                Â·
                                inputmode="numeric"
                                type="text"
                                name="security-code"
                                placeholder="&#149;&#149;&#149;"
                              />
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="controls">
                          <label class="control-label">Expiration Date</label>
                          <input
                            class="expiration-month-and-year form-control"
                            type="text"
                            name="expiration-month-and-year"
                            placeholder="MM / YY"
                          />
                        </div>
                      </div>
                      <button class="submit mt-3">
                        <span>Make a payment </span>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <div>
                <div class="tab-grid" id="payment-paypal-form">
                  <div class="row">
                    <div class="col-md-12 pay-forms">
                      <img
                        class="pp-img"
                        src="./FE/image/paypal.png"
                        alt="Image Alternative text"
                        title="Image Title"
                      />
                      <a class="btn btn-primary" id="paypal-checkout"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--Plug-in Initialisation-->
        </div>
      </div>
    </section>
    <!-- //payment page -->
    <!-- footer -->
    <?php include('./includes/footer.php')?>
    <!-- script -->
    <?php include('./includes/script.php')?>
    
    <!-- paypal -->
    <script src="https://www.paypal.com/sdk/js?client-id=test"></script>
  <script>paypal.Buttons().render('#paypal-checkout');</script>
    <!-- active -->
    <script type="text/javascript">
      document.getElementById("payment-paypal").addEventListener("click", activePaymentPaypal);
      function activePaymentPaypal() {
        document.getElementById("payment-card-form").style.display = "none";
        document.getElementById("payment-paypal-form").style.display = "block";
      }
      document.getElementById("payment-card").addEventListener("click", activePaymentCard);
      function activePaymentCard() {
        document.getElementById("payment-card-form").style.display = "block";
        document.getElementById("payment-paypal-form").style.display = "none";
      }
    </script>
  </body>
</html>
