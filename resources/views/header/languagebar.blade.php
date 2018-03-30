<?php use \App\Http\Controllers\customizeController; ?>
<div class="panel" style=" border-radius: 0; height:11%; background:<?php echo customizeController::themeColor(); ?>; margin-bottom:0px;" >
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-4 col-lg-4" align="left">
                <a href="{{ URL::to('/dashboard') }}"><img src="<?php echo customizeController::logoHeader(); ?>" width="60px"></a>
            </div>

            <div class="col-xs-4 col-lg-4" align="center" style="margin-top:-0.3%;">
                <h2 style="color:{{config('pathConfig.header_title_word_color')}};"><strong><?php echo customizeController::headerTitle(); ?></strong></h2>
            </div>
            
            <div class="col-xs-4 col-lg-4" align="right" style="margin-top:0.3%">
                <a href="{{ URL::to('/change/th') }}"><img src="{{asset('images/flag_th.png')}}" width="40px"></a>
                <a href="{{ URL::to('/change/en') }}"><img src="{{asset('images/flag_en.png')}}" width="40px"></a>
            </div>
        </div>
    </div>
</div>