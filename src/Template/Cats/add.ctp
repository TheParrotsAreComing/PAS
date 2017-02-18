  <div class="body">
    <div class="add-view column">
      <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
      <div class="add-cont scroll1" data-ix="page-load-fade-in">
        <div class="add-header">
          <div class="add-field-h1">Create a cat</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
        </div>
        <?= $this->Form->create($cat) ?>
        <div class="add-input-form-wrap w-form">
          <form class="add-input-form" data-name="Email Form 4" id="email-form-4" name="email-form-4">
            <label class="add-field-h2" for="First-Name">personal information</label>
            <div class="add-field-seperator"></div>
            <!--<label class="add-field-h3" for="cat_name-2">name:</label>
            <input autofocus="autofocus" class="add-input w-input" data-name="cat_name" id="cat_name-2" maxlength="256" name="cat_name" placeholder="Bella" required="required" type="text">-->
            <?php echo $this->Form->input('cat_name', ['class' => 'add-input w-input'], 
            ['label' => ['text' => 'Cat Name', 'class' => 'add-field-h3']]); ?>
            <!--<label class="add-field-h3" for="Month">Date of birth:</label>-->
            <div class="date-cont">
            <?php echo $this->Form->input('dob', ['label' => ['text' => 'Date of Birth:', 'class' => 'add-field-h3']], ['select' => ['class' => 'date-month w-select']]); ?>
            <!--  <select class="date-month w-select" data-name="month" id="month-2" name="month">
                <option value="">Month</option>
                <option value="01">01 - January</option>
                <option value="02">02 - February</option>
                <option value="03">03 - March</option>
                <option value="04">04 - April</option>
                <option value="05">05 - May</option>
                <option value="06">06 - June</option>
                <option value="07">07 - July</option>
                <option value="08">08 - August</option>
                <option value="09">09 - September</option>
                <option value="10">10 - October</option>
                <option value="11">11 - November</option>
                <option value="12">12 - December</option>
              </select>
              <select class="date-day w-select" data-name="day" id="day-2" name="day">
                <option value="">Day</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
              <select class="date-year w-select" data-name="year" id="year-2" name="year">
                <option value="">Year</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
              </select>-->
            </div>
            <label class="add-field-h3" for="breed-2">Breed/Color/Coat:</label>
            <!--<input autofocus="autofocus" class="add-input w-input" data-name="breed" id="breed-2" maxlength="256" name="breed" placeholder="Siamese" required="required" type="text">
            <label class="add-field-h3" for="color">color:</label>
            <input autofocus="autofocus" class="add-input w-input" data-name="color" id="color" maxlength="256" name="color" placeholder="Brown" required="required" type="text">
            <label class="add-field-h3" for="coat-2">coat:</label>
            <input autofocus="autofocus" class="add-input w-input" data-name="coat" id="coat-2" maxlength="256" name="coat" placeholder="Short" required="required" type="text">
            -->
            <?php echo $this->Form->input('breed', ['class' => 'add-input w-input', 'label' => false]); ?>
            <!--<label class="add-field-h3" for="field">size:</label>
            <div class="w-tabs" data-duration-in="300" data-duration-out="100">
              <div class="size-cont w-tab-menu">
                <a class="left size-select w-inline-block w-tab-link" data-w-tab="small">
                  <div>small</div>
                </a>
                <a class="size-select w-inline-block w-tab-link" data-w-tab="medium">
                  <div>medium</div>
                </a>
                <a class="right size-select w-inline-block w-tab-link" data-w-tab="large">
                  <div>large</div>
                </a>
              </div>
            </div>-->
            <label class="add-field-h3" for="E-mail">gender:</label>
            <div class="gender-cont">
              <div class="gender-switch w-embed" data-ix="gender-switch">
                <style>
                  /* ---------- SWITCH ---------- */
                  .switch {
                    background: #eee;
                    border-radius: 32px;
                    display: block;
                    height: 32px;
                    position: relative;
                    width: 80px;
                  }
                  .switch input {
                    height: 32px;
                    left: 0;
                    opacity: 0;
                    position: absolute;
                    top: 0;
                    width: 80px;
                    z-index: 2;
                  }
                  .switch input:checked~.toggle {
                    left: 4px;
                  }
                  .switch input~:checked~.toggle {
                    left: 50px;
                  }
                  .switch input:checked {
                    z-index: 0;
                  }
                  .toggle {
                    background: #0172ff;
                    border-radius: 50%;
                    height: 28px;
                    left: 0;
                    position: absolute;
                    top: 2px;
                    -webkit-transition: left .2s ease;
                    -moz-transition: left .2s ease;
                    -ms-transition: left .2s ease;
                    -o-transition: left .2s ease;
                    transition: left .2s ease;
                    width: 28px;
                    z-index: 1;
                  }
                </style>
                <div class="switch white">
                  <input type="radio" name="switch" id="female" checked="">
                  <input type="radio" name="switch" id="male">
                  <span class="toggle"></span>
                </div>
              </div>
              <div class="gender-female">male</div>
              <div class="gender-male">female</div>
            </div>
            <label class="add-field-h3" for="E-mail">kitten:</label>
            <div class="gender-cont">
              <div class="gender-switch w-embed" data-ix="gender-switch">
                <style>
                  /* ---------- SWITCH ---------- */
                  .switch-kitten {
                    background: #eee;
                    border-radius: 32px;
                    display: block;
                    height: 32px;
                    position: relative;
                    width: 80px;
                  }
                  .switch-kitten input {
                    height: 32px;
                    left: 0;
                    opacity: 0;
                    position: absolute;
                    top: 0;
                    width: 80px;
                    z-index: 2;
                  }
                  .switch-kitten input:checked~.toggle {
                    left: 4px;
                  }
                  .switch-kitten input~:checked~.toggle {
                    left: 50px;
                  }
                  .switch-kitten input:checked {
                    z-index: 0;
                  }
                  .toggle {
                    background: #0172ff;
                    border-radius: 50%;
                    height: 28px;
                    left: 0;
                    position: absolute;
                    top: 2px;
                    -webkit-transition: left .2s ease;
                    -moz-transition: left .2s ease;
                    -ms-transition: left .2s ease;
                    -o-transition: left .2s ease;
                    transition: left .2s ease;
                    width: 28px;
                    z-index: 1;
                  }
                </style>
                <div class="switch white">
                  <input type="radio" name="switch-kitten" id="kitten" checked="">
                  <input type="radio" name="switch-kitten" id="adult">
                  <span class="toggle"></span>
                </div>
              </div>
              <div class="gender-female">adult</div>
              <div class="gender-male">kitten</div>
            </div>
            <label class="add-field-h2" for="First-Name">care Information</label>
            <div class="add-field-seperator"></div>
            <label class="add-field-h3" for="microchip-2">microchip #:</label>
            <input class="add-input w-input" data-name="microchip" id="microchip-2" maxlength="256" name="microchip" placeholder="A1B2C3D4E5" required="required" type="text">
            <label class="add-field-h3" for="adoption_fee">adoption fee:</label>
            <div class="w-clearfix">
              <input class="add-input currency w-input" data-name="adoption_fee" id="adoption_fee" maxlength="256" name="adoption_fee" placeholder="65" required="required" type="text">
              <div class="symbol-dollar">$</div>
            </div>
            <label class="add-field-h3" for="State">State:</label>
            <input class="add-input w-input" data-name="State" id="State" maxlength="256" name="State" placeholder="Alabama" required="required" type="text">
            <label class="add-field-h3" for="Phone">Phone:`</label>
            <input class="add-input w-input" data-name="Phone" id="Phone" maxlength="256" name="Phone" placeholder="(123) 456-7890" required="required" type="email">
            <div class="add-button-cont"><a class="add-cancel" href="cat-list.html">Cancel</a>
              <input class="add-submit w-button" data-wait="Please wait..." type="submit" value="Submit">
            </div>
          </form>
          <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form</div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>