<div class="sign_in_sec" id="tab-2">
   
        <h3>S'enregistrer</h3>

        @if($errors->has('name'))
            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
        @elseif($errors->has('email'))
            <div class="alert alert-danger">{{ $errors->first('email') }}</div>
        @elseif($errors->has('password'))
            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
        @elseif($errors->has('password_confirmation'))
            <div class="alert alert-danger">{{ $errors->first('password_confirmation') }}</div>
        @elseif($errors->has('condition'))
            <div class="alert alert-danger">You must accept our terms and conditions</div>
        @endif

        <form wire:submit.prevent="submit" action="#">
            @csrf
            <div class="row">
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input wire:model="name" type="text" name="name" placeholder="Username">
                        <i class="la la-user"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input wire:model="email" type="text" name="email" placeholder="Email">
                        <i class="la la-envelope"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input wire:model="phone" type="text" name="phone" placeholder="Telephone">
                        <i class="la la-phone"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input wire:model="password" type="password" name="password" placeholder="Password">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="sn-field">
                        <input wire:model="password_confirmation" type="password" name="password_confirmation" placeholder="Repeat Password">
                        <i class="la la-lock"></i>
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <div class="checky-sec st2">
                        <div class="fgt-sec">
                            <input wire:model="condition" type="checkbox" name="condition" id="c2">
                            <label for="c2">
                                <span></span>
                            </label>
                            <small>Oui, je comprends et j'accepte les <a href="#" data-toggle="modal" data-target="#mymodal" data-whatever="@mdo">Termes & Conditions</a> de CIMIM.</small>
                        </div><!--fgt-sec end-->
                    </div>
                </div>
                <div class="col-lg-12 no-pdd">
                    <button type="submit" >S'enregistrer</button>
                </div>
            </div>
        </form>
</div>
