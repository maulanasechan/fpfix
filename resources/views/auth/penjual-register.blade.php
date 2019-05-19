<form method="POST" action="{{ route('penjual.register.submit') }}" enctype="multipart/form-data">
            @csrf
      <label>From</label>
      <input type="time" name="start" class="form-control" value="00:00" required >

      <center>
            <button type="submit" class="round-button-login-new" style="top: 92.2%; width: 5%; height: 10%">
                {{ __('Register') }}
            </button>
    </center>       
</form>