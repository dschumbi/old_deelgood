<div class="tab-pane fade" id="v-pills-properties" role="tabpanel" aria-labelledby="v-pills-properties-tab">
    <div class="form-group row">
        <div class="col-12 mb-3">
            <label for="manufacturer">Welche Eigenschaften hat der angebotene Artikel? <br>Folgende Produkteigenschaften wünscht sich der Kunde:</label>
        </div>
        @foreach($auction->properties as $property)

        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
                <label>{{ Form::checkbox('properties[]',
                                $property->id,
                                false,
                                ['class' => 'grey','data-id'=> $property->id]) }}
                    {{$property->name}}
                </label>
                <div class="clearfix"></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
