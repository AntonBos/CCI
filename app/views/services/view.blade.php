@extends('layout.frontend')
@section('content')
						<div class="contentHead">
                            <h1>Services</h1>
                            <ul>
                            	<?php
                            	foreach($layoutServices as $layoutServiceItem){

                            		if($layoutServiceItem->slug == $layoutService){

                            			$class = 'class="active"';
                            		}else{

                            			$class = '';
                            		}

                            		?><li {{ $class }}><a href="/services/{{ $layoutServiceItem->slug }}">{{ $layoutServiceItem->name }}</a></li><?php
                            	}
                            	?>
                            </ul>
                        </div>

                        <div class="contentBody">

                            <div class="catImage">
                                <h2>Cabling</h2>
                                <img src="assets/img/imageuploads/cabling-temp.jpg" alt="">
                            </div>

                            <div class="subCatNav">
                                <ul>
                                    <li><a href="">Rit</a></li>
                                    <li><a href="">Molex</a></li>
                                    <li><a href="">Panduit</a></li>
                                    <li class="active"><a href="">Systimax</a></li>
                                    <li><a href="">Krone</a></li>
                                    <li><a href="">ITT Canon</a></li>
                                </ul>
                            </div>

                            <div class="subCatCont">


                            </div>

                            

                        </div>

@endsection