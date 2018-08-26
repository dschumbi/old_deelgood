
  <div class="form-row">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col">
      <label for="firstname">Vorname</label>
      <input type="text" name="firstname" value="{{ $user->firstname }}" class="form-control">
    </div>
    <div class="form-group col">
      <label for="name">Nachname</label>
      <input type="text" name="name" value="{{ $user->name }}" class="form-control">
    </div>
  </div>
  <div class="form-row">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col">
      <label for="street">Straße</label>
      <input type="text" name="street" value="{{ $user->street }}" class="form-control">
    </div>
  </div>
  <div class="form-row">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-2">
      <label for="zip">PLZ</label>
      <input type="text" name="zip" value="{{ $user->zip }}" class="form-control">
    </div>
    <div class="form-group col-10">
      <label for="city">Ort</label>
      <input type="text" name="city" value="{{ $user->city }}" class="form-control">
    </div>
  </div>
  <div class="form-row">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-6">
      <label for="country">Land</label>
      <input type="text" name="country" value="{{ $user->country }}" class="form-control">
    </div>
    <div class="form-group col-6">
      <label for="country">Möchten Sie auch als Händler aktiv werden?</label><br>
      <label class="custom-control custom-radio">
        {{ Form::radio('trader', 0, $user->trader == 0 ? true : false, ['class' => 'custom-control-input'] ) }}
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Nein</span>
      </label>
      <label class="custom-control custom-radio">
        {{ Form::radio('trader', 1, $user->trader == 1 ? true : false, ['class' => 'custom-control-input'] ) }}
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description">Ja</span>
      </label>
    </div>
  </div>
  <div class="form-row">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group col-6">
      <label for="email">Email</label>
      <input type="email" name="email" value="{{ $user->email }}" class="form-control">
    </div>
    <div class="form-group col-6">
      <label for="dateOfBirth">Geburtsdatum</label>
        <div class='input-group date' id='dateOfBirth'>
            <input type='text' class="form-control" name="dateOfBirth" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
    <div class="form-row">
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-btn fa-sign-in"></i>Update
      </button>
    </div>
  </div>
