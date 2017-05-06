<div class="body">
    <div class="add-view column">
        <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
        <div class="add-cont scroll1" data-ix="page-load-fade-in">
            <div class="add-header">
                <div class="add-field-h1">Create an adoption event</div>
            </div>
            <?= $this->Form->create($adoptionEvent) ?>
                <div class="add-input-form-wrap w-form">
                    <form class="add-input-form">
                        <label class="add-field-h2" for="First-Name">Adoption Event Information</label>
                        <div class="add-field-seperator"></div>
                        <label class="add-field-h3">Event Date<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <div class="date-cont">
                            <?php echo $this->Form->month('event_date', array('value'=>$eventDate[1],'class' => 'date-month w-select', 'empty' => 'Month', 'required'=>true)); ?>
                            <?php echo $this->Form->day('event_date', array('value'=>$eventDate[2],'class' => 'date-day w-select', 'empty' => 'Day', 'required'=>true)); ?>
                            <?php echo $this->Form->year('event_date', array('value'=>$eventDate[0],'class' => 'date-year w-select', 'empty' => 'Year', 'required'=>true)); ?>
                       </div>
                       <?php echo $this->Form->input('description', 
                            array('type' => 'textarea', 'label' => 
                                ['text' => 'Description<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input multi-line w-input', 
                            'placeholder' => 'Type a description for this event...')); ?>
                        <div class="add-field-h3">Cats:</div>
                        <div class="cats-list">
                        </div>
                        <div class="medical-wrap">
                            <a id="catAdd" class="profile-add-cont w-inline-block" data-ix="add-cat" href="#">Add Cat</a>
                        </div>
                        <div class="add-field-h3">Volunteers:</div>
                        <div class="users-list">
                        </div>
                        <div class="medical-wrap">
                            <a id="userAdd" class="profile-add-cont w-inline-block" data-ix="add-user" href="#">Add Volunteer</a>
                        </div>
                        <div class="add-button-cont">
                       <?= $this->Html->link("Cancel", ['controller'=>'adoptionEvents', 'action'=>'index'], ['id'=>'AdoptionEventCancel', 'class'=>'add-cancel w-button']); ?>
                       <?= $this->Form->button("Submit",['id'=>'AdoptionEventAdd', 'class'=>'add-submit w-button', 'type'=>'submit']); ?>

                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>

<div class="floating-overlay add-cat">
    <div class="confirm-cont add-cat-inner">
        <h4>Select a cat to add</h4>
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <div class="cat_options">
            <?= $this->Form->input('cat', ['class'=>'add-input w-input', 'options'=>$select_cats]); ?>
            </div>
        </form>
        </br>
        <div class="confirm-button-wrap w-form">
            <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <a class="delete add-cat-btn confirm-button w-button" href="#">Add Cat</a>
        </div>
    </div>
</div>
<div class="floating-overlay add-user">
    <div class="confirm-cont add-user-inner">
        <h4>Select a user to add</h4>
        <form class="confirm-button-cont" data-name="Email Form 2" id="email-form-2" name="email-form-2">
            <div class="user_options">
            <?= $this->Form->input('user', ['class'=>'add-input w-input', 'options'=>$select_users]); ?>
            </div>
        </form>
        </br>
        <div class="confirm-button-wrap w-form">
            <a class="cancel confirm-button w-button" data-ix="confirm-cancel" href="#">Cancel</a>
            <a class="delete add-user-btn confirm-button w-button" href="#">Add User</a>
        </div>
    </div>
</div>

<script>
$(function () {
    var catsArr = [];
    var usersArr = [];
    $('a[data-ix="add-cat"]').click(function(){
        $('.add-cat').css('display','flex');
        $('.add-cat').css('opacity', '1');
        $('.add-cat-inner').css('display','flex');
        $('.add-cat-inner').css('opacity', '1');
    });
    $('a[data-ix="add-user"]').click(function(){
        $('.add-user').css('display','flex');
        $('.add-user').css('opacity','1');
        $('.add-user-inner').css('display','flex');
        $('.add-user-inner').css('opacity','1');
    });
    $('.add-cat-btn').click(function(e) {
        e.stopPropagation();
        e.preventDefault();
        $('.add-cat').css('display','none');
        $('.add-cat-inner').css('display','none');
        $('.add-cat-inner').css('opacity','0');
        var selectedCat_id = $('#cat').val();
        catsArr.push(selectedCat_id);
        var selectedCat = $('#cat option:selected').text();
        var cat_cont = $('<div/>');
        cat_cont.addClass('profile-content-cont');

        var cat_text = $('<div/>');
        cat_text.addClass('card-h1');

        var cat_remove = $('<a/>');
        cat_remove.addClass('cat-remove');
        cat_remove.attr('href', '#');
        cat_remove.text('Remove');
        cat_remove.attr('data-id', selectedCat_id);

        cat_text.text(selectedCat);

        var input = $('<input/>');
        input.attr('name', 'cats[_ids][]');
        input.attr('type', 'hidden');
        input.val(selectedCat_id);

        cat_cont.append(input);
        cat_cont.append(cat_text);
        cat_cont.append(cat_remove);
        $('.cats-list').prepend(cat_cont);

        var dropdown_option = $('.cat_options option[value='+selectedCat_id+']');
        dropdown_option.remove();
    });
    $('.cats-list').on('click', '.cat-remove',function() {
        var that = $(this);
        cat_id = that.attr('data-id');
        that.parent().remove();
        var removedCat = that.parent().text().slice(0,-6);
        var option = $('<option/>');
        option.text(removedCat).val(cat_id);
        $('#cat').prepend(option);
    });
    $('.add-user-btn').click(function(e) {
        e.stopPropagation();
        e.preventDefault();
        $('.add-user').css('display','none');
        $('.add-user-inner').css('display','none');
        $('.add-user-inner').css('opacity','0');
        var selectedUser_id = $('#user').val();
        usersArr.push(selectedUser_id);
        var selectedUser = $('#user option:selected').text();
        var user_cont = $('<div/>');
        user_cont.addClass('profile-content-cont');

        var user_text = $('<div/>');
        user_text.addClass('card-h1');
        
        var user_remove = $('<a/>');
        user_remove.addClass('user-remove');
        user_remove.attr('href', '#');
        user_remove.text('remove');
        user_remove.attr('data-id', selectedUser_id);

        user_text.text(selectedUser);

        var input = $('<input/>');
        input.attr('name', 'users[_ids][]');
        input.attr('type', 'hidden');
        input.val(selectedUser_id);

        user_cont.append(input);
        user_cont.append(user_text);
        user_cont.append(user_remove);
        $('.users-list').prepend(user_cont);

        var dropdown_option = $('.user_options option[value='+selectedUser_id+']');
        dropdown_option.remove();
    });
    $('.users-list').on('click', '.user-remove',function() {
        var that = $(this);
        user_id = that.attr('data-id');
        that.parent().remove();
        var removedUser = that.parent().text().slice(0,-5);
        var option = $('<option/>');
        option.text(removedUser).val(user_id);
        $('#user').prepend(option);
    });
});
</script>