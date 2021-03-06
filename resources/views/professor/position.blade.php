@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('cabecalho')
    ÁREA DE INTERESSE
@endsection
@section('username')
    {{ "Bem vindo, ". Session::get('user')['user'] }}
@endsection
@section('content')
    <div class="container">
		<ul class="nav nav-tabs">
            {{-- <li><a href="{{ route('personal-data.index') }}">Dados Pessoais</a></li> --}}
            <li class="disabled"><a href="#">Dados Pessoais</a></li>
            {{-- <li><a href="{{ route('professorAcademicData') }}">Dados Academicos</a></li> --}}
            <li class="disabled"><a href="#">Dados Academicos</a></li>
            <li class="active, link3"><a href="{{ route('professorPosition', ['id' => Session::get('vagueId')]) }}">Área de Interesse</a></li>
		</ul>
        <div class="vague-information">
            <p class="ob, cor-campo">*Obrigatório</p>
            <p>Você esta se credenciando</p>
            <p><strong>{{$data->title}}</strong></p>
            Requisitos
            <ul>
                <li>Docente nas universidades conveniadas com a Univesp</li>
                <li>Minimo: Título de Doutor</li>
            </ul>
        </div>
		<hr/>

        <form action="position" method="post">
            {{ csrf_field() }}                
        
          <h5><strong class="left">Serviços</strong> <span class="cor-campo"> *</span></h5>
          <i id="text-negrito">Você pode se credenciar para vários serviços</i>
<br>
			<div class="col-md-4">             
                  <span class="autoria"><b>Autoria</b></span><br>
				<div class="checkbox">
                        <div class="row">
                        @foreach($data->services as $services)
                        <div class="col-md-12">
                            <label>
                                <input type="checkbox" name="sevices[]" value="{{$services->id}}">{{$services->title}}
                            </label>
                        </div>
                 @endforeach
                 </div>
				</div>
            </div>
            <div class="col-md-4">
                  <span class="autoria"><b>Acompanhamento da oferta de disciplinas</b></span><br>
				<div class="checkbox">
                        <div class="row">
                        @foreach($data->services as $services)
                        <div class="col-md-12">
                            <label>
                                <input type="checkbox" name="sevices[]" value="{{$services->id}}">{{$services->title}}
                            </label>
                        </div>
                 @endforeach
                 </div>
				</div>
            </div>
            <div class="col-md-4">
                  <span class="autoria"><b>Validação de material</b></span><br>
				<div class="checkbox">
                        <div class="row">
                        @foreach($data->services as $services)
                        <div class="col-md-12">
                            <label>
                                <input type="checkbox" name="sevices[]" value="{{$services->id}}">{{$services->title}}
                            </label>
                        </div>
                 @endforeach
                 </div>
				</div>
			</div>
            
				
           <!-- <div class="row">
                <h4>Declaração de Título e Experiência</h4><hr />
                <span id="autoria"><b>Validação de material</b></span><br>
				<div class="checkbox checkbox-danger">
                        <input id="checkbox1" type="checkbox" checked="">
                        <label for="checkbox1">
                            Check me out
                        </label>
                </div>
                <div class="checkbox checkbox-danger">
                        <input id="checkbox2" type="checkbox" checked="">
                        <label for="checkbox2">
                            Check me out
                        </label>
                </div>      
            </div>
            <div class="row">
                <span id="autoria"><b>Validação de material</b></span><br>
				<div class="checkbox checkbox-danger">
                        <input id="checkbox3" type="checkbox" checked="">
                        <label for="checkbox3">
                            Check me out
                        </label>
                </div>
                <div class="checkbox checkbox-danger">
                        <input id="checkbox4" type="checkbox" checked="">
                        <label for="checkbox4">
                            Check me out
                        </label>
                </div>      
            </div>
            <div class="row">
                <span id="autoria"><b>Validação de material</b></span><br>
				<div class="checkbox checkbox-danger">
                        <input id="checkbox5" type="checkbox" checked="">
                        <label for="checkbox5">
                            Check me out
                        </label>
                </div>
                <div class="checkbox checkbox-danger">
                        <input id="checkbox6" type="checkbox" checked="">
                        <label for="checkbox6">
                            Check me out
                        </label>
                </div>      
            </div>
            

              <?php
              /*  $title = [] ;
                $subtitle = [] ;
                $name = [] ;
                $id = [] ;
                foreach ($vacancies as $vacancy){
                    $title[$vacancy->title] = $vacancy->title;
                    $subtitle[$vacancy->title][$vacancy->subtitle] = $vacancy->subtitle ;
                    $name[$vacancy->title][$vacancy->subtitle][$vacancy->name] = $vacancy->name;
                    $id[$vacancy->title][$vacancy->subtitle][$vacancy->name][$vacancy->vacancy_criteria[0]->criterion_id] = $vacancy->vacancy_criteria[0]->criterion_id;

                }*/
                ?>

              <!--  @foreach($vacancies as $vacancy)
                    <input type="hidden" name="vacancy_id" value="{{$vacancy->vacancy_criteria[0]->vacancy_id}}">
                    @if(!empty($title[$vacancy->title]))
                       <h5><strong>{{$title[$vacancy->title]}}<span class="cor-campo">*</span></strong></h5>
                     @foreach($vacancies as $v)
                       @if(!empty($subtitle[$vacancy->title][$v->subtitle]))
                            <div class="checagem-radio"></div>
                            <div class="checkbox"></div>
                            <label id="subtitle">
                                <input type="checkbox" name="vc[]" value="{{$v->vacancy_criteria[0]->id}}" onclick="return itemSelect(this)"/>{{$subtitle[$vacancy->title][$v->subtitle]}}
                                @foreach($vacancies as $r)
                                    @if(!empty($name[$vacancy->title][$v->subtitle][$r->name]))

                                        <div class="item-1, col-md-12" style="display:none">
                                            <input type="checkbox" name="criteria[]" id="{{$id[$vacancy->title][$v->subtitle][$r->name][$r->id]}}" value ="{{$id[$vacancy->title][$v->subtitle][$r->name][$r->id]}}" name="disciplina"/><span class="alinhamento-radio">{{$name[$vacancy->title][$v->subtitle][$r->name]}}</span>
                                        </div>

                                    @endif
                                    <?php
                                    $name[$vacancy->title][$v->subtitle][$r->name] = null;
                                    ?>
                                @endforeach
                            </label>
                        @endif
                           <?php
                           $subtitle[$vacancy->title][$v->subtitle] = null;
                           ?>
                    @endforeach
                    @endif
                        <?php
                        $title[$vacancy->title] = null;
                                                           ?>

                                                           
                @endforeach-->
                <!--<br>
                <div class="row">
                    <div class="col-md-4">
                        <span id="autoria" class="exp"><b>Experiência na Modalidade a Distância</b></span><br>
                <br>
                        <div class="checkbox">
                                <div class="col-md-12">
                                    <input type="checkbox" name="sevices[]" value=""><label style="margin:0px;padding:0;">Área da disciplina</label><br>
                                    <input type="checkbox" name="sevices[]" value=""><label style="margin:0px;padding:0;">Área correlata</label>
                                </div>
                            
                        </div>
                    </div>
                </div>

            <div class="row">

                <div class="float-right">
                    <button type="submit" class="btn btn-danger">AVANÇAR</button>
                </div>
            </div>
           <br /><br />
            </form>


	   <script type="text/javascript">

		function itemSelect(elem) {
		  var si = $(elem).val();
		  var isCheck = $(elem).is(':checked');

		  if(isCheck) {
			fadeIn($(elem).siblings());
		  } else {
			fadeOut($(elem).siblings());
		  }
		}

		function fadeIn(itemClass, itemId) {
		  $(itemClass).fadeIn();
		  $(itemId).addClass('borda');
		}

		function fadeOut(itemClass, itemId) {
		  $(itemClass).fadeOut();
		  $(itemId).removeClass('borda');
		}
        
        
        

       </script>-->
       
       <div class="col-md-12">
			<hr />
			<h4>Declaração de Título de Experiência</h4>
                <div class="checagem-radio"></div>
                <br>
				<h5><strong class="autoria">Título de Mestre<span class="cor-campo">*</span></strong></h5>
				<div class="checagem-radio"></div>
				<div class="checkbox">
				  <label>
					<input type="checkbox" name="1" id="1" value="1" onclick="return itemSelect(this)"/>Área de disciplina
					<div class="item-1, col-md-12" style="display:none">
						<input type="radio" id="1" name="disciplina"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="2" name="disciplina"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="3" name="disciplina"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="4" name="disciplina"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
					<div class="checagem"></div>
				   <label>
				   <input type="checkbox" name="5" id="5" value="5" onclick="return itemSelect(this)"/>Área correlata
					<div class="item-2, col-md-12" style="display:none">
						<input type="radio" id="5" name="correlata"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="6" name="correlata"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="7" name="correlata"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="8" name="correlata"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
				  </label>
                </div>
                <br>
				<div class="checagem-radio"></div>
				<h5><strong class="autoria">Título de Doutor<span class="cor-campo">*</span></strong></h5>
				<div class="checagem-radio"></div>
				<div class="checkbox">
				  <label>
					<input type="checkbox" name="9" id="9" value="9" onclick="return itemSelect(this)"/>Área de disciplina
					<div class="item-3, col-md-12" style="display:none">
						<input type="radio" id="9" name="disciplina"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="10" name="disciplina"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="11" name="disciplina"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="12" name="disciplina"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
					<div class="checagem"></div>
				   <label>
				   
				   <input type="checkbox" name="13" id="13" value="13" onclick="return itemSelect(this)"/>Área correlata
					<div class="item-4, col-md-12" style="display:none">
						<input type="radio" id="13" name="correlata"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="14" name="correlata"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="15" name="correlata"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="16" name="correlata"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
                </div>
                <br>
				<div class="checagem-radio"></div>
				<h5><strong class="autoria">Experiência Docente<span class="cor-campo">*</span></strong></h5>
				<div class="checagem-radio"></div>
				<div class="checkbox">
				  <label>	
					<input type="checkbox" name="17" id="17" value="17" onclick="return itemSelect(this)"/>Área de disciplina
					<div class="item-5, col-md-12" style="display:none">
						<input type="radio" id="17" name="disciplina"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="18" name="disciplina"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="19" name="disciplina"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="20" name="disciplina"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
					<div class="checagem"></div>
				   <label>
				   
				   <input type="checkbox" name="21" id="21" value="21" onclick="return itemSelect(this)"/>Área correlata
					<div class="item-6, col-md-12" style="display:none">
						<input type="radio" id="21" name="correlata"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="22" name="correlata"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="23" name="correlata"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="24" name="correlata"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
                </div>
                <br>
				<div class="checagem-radio"></div>
				<h5><strong class="autoria">Experiência da Modalidade a Distância<span class="cor-campo">*</span></strong></h5>
				<div class="checagem-radio"></div>
				<div class="checkbox">
				  <label>
					<input type="checkbox" name="25" id="25" value="25" onclick="return itemSelect(this)"/>Área de disciplina
					<div class="item-7, col-md-12" style="display:none">
						<input type="radio" id="25" name="disciplina"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="26" name="disciplina"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="27" name="disciplina"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="28" name="disciplina"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
					<div class="checagem"></div>
				   <label>
				   
				   <input type="checkbox" name="29" id="29" value="29" onclick="return itemSelect(this)"/>Área correlata
					<div class="item-8, col-md-12" style="display:none">
						<input type="radio" id="29" name="correlata"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="30" name="correlata"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="31" name="correlata"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="32" name="correlata"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
				</div>
		</div>
		<div class="checagem-radio"></div>
        <div class="row">
        	<div class="float-right">
        		<button type="button" class="btn btn-danger">AVANÇAR</button>
        	</div>
        </div>
       <br /><br />
	   </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
	   <script type="text/javascript">

		function itemSelect(elem) {
		  var si = $(elem).val();
		  var isCheck = $(elem).is(':checked');

		  if(isCheck) {
			fadeIn($(elem).siblings());
		  } else {
			fadeOut($(elem).siblings());
		  }
		}

		function fadeIn(itemClass, itemId) {
		  $(itemClass).fadeIn();
		  $(itemId).addClass('borda');
		}

		function fadeOut(itemClass, itemId) {
		  $(itemClass).fadeOut();
		  $(itemId).removeClass('borda');
		}

        $(document).ready(function() {
            $('input:radio, input:checkbox').on('click', function(e) {
               // $(e.target).css('background', 'red');
            });
        });
	
	   </script>


  @endsection
