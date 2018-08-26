<div class="tab-pane fade show active" id="v-pills-base" role="tabpanel" aria-labelledby="v-pills-base-tab">
    <!-- <h3>Artikelstamm</h3> -->
    <div class="form-group row">
        <div class="col">
            <label for="article">Artikel</label>
            <input type="text" name="article" id="article" placeholder="Name des Artikels" class="form-control" />
            <small id="articleHelpBlock" class="form-text text-muted">
              Geben Sie hier die Bezeichnung des Artikels ein, den Sie auf die Anfrage anbieten möchten
            </small>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-4">
            <label for="price">Ihr Preis</label>
            <div class="input-group">
                <input type="text" name="price" id="price" placeholder="0" class="form-control" />
                <span class="input-group-addon">EUR (€)</span>
            </div>
            <small id="priceHelpBlock" class="form-text text-muted">
              Wieviel kostet der Artikel?
            </small>
        </div>
        <div class="col">
            <label for="manufacturer">Hersteller</label>
            <input type="text" name="manufacturer" id="manufacturer" placeholder="Name des Herstellers" class="form-control" />
            <small id="manufacturerHelpBlock" class="form-text text-muted">
              Geben Sie hier den Namen des Herstellers an
            </small>
        </div>
    </div>
</div>
