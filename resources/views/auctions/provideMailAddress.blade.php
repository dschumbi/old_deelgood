<div class="panel panel-default">
    <div class="panel-heading">Ohne Registrierung fortfahren</div>
    <hr>
    <div class="panel-body">
        <p>Sie können Ihre Anfrage auch ohne Registrierung starten. Geben Sie hierfür bitte eine Mail-Adresse an. Im Anschluss senden wir Ihnen eine E-Mail zu, in der Sie die Anfrage bestätigen können. Sie können insgesamt bis zu drei Anfragen ohne Registrierung starten</p>
        <hr>
        <form method="POST" action="/auctions/start">
          <div class="form-group">
            {{ csrf_field() }}
            <label for="exampleInputEmail1">Ihre Mail-Adresse</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            <input type="hidden" name="auctionToken" id="auctionToken" value="{{ session('auction')->auctionToken }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
