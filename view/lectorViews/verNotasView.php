{{> headerLector}}


<div class="row col-12 justify-content-between">
    {{> sideBarLector}}
            <!-- ======= Catalogo de diarios Section ======= -->
            <section id="blog" class="blog col-md-9">
                <div class="column container-fluid">
                    <div class="section-title">
                        <h2>Notas</h2>
                        <p>Gratis y pagas</p>
                    </div>
                    
                        <div class="card-deck">
                        {{#notas}}

                        <div class="col-4 mb-4"  >
                            <div class="card"  >
                                {{#gratis}}
                                    <span style="margin: 10px;position: absolute;top: 0;" class="bg-success text-white p-1 rounded">Gratis</span> 
                                {{/gratis}}
                                {{^gratis}}
                                    <span  style="margin: 10px;position: absolute;top: 0;" class="bg-info text-white p-1 rounded">$$$</span> 
                                {{/gratis}}
                                <img class="card-img-top" src="/images/icon.png" alt="Card image cap" />
                                <div class="card-body pb-1">
                                    <h5 class="card-title"><strong>{{titulo}}</strong></h5>
                                    <p class="card-text ">{{copete}}</p>
                                    {{#gratis}}
                                    <a href="/nota/verNota/{{id}}" class="btn btn-success">Leer</a> 
                                    {{/gratis}}
                                    {{^gratis}}
                                    <a href="/nota/" class="btn btn-info">Comprar</a> 

                                    {{/gratis}}
                                </div>
                            </div>
                            </div>
                        {{/notas}}
                        </div>
                        </div>

                </div>
            </section>
            <!-- End Catalogo de diarios -->
</div>
{{> footer}}
