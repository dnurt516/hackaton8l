<?php 
	$ret = '<div class="wrapper" style="margin-top: 32px;">
	<div class="container">
		<div class="weather--today">
			<div class="weather--today__data">
				<p>Погода сегодня в Павлодаре</p>
				<div class="temperature"><img src="" alt=""><span></span></div>
				<span class="feel_temp"></span><br>
				<b>Ветер: </b><span class="wind"></span><br>
				<b>Влажность: </b><span class="humidity"></span><br>
				<b>Давление: </b><span class="pressure"></span><br>
				<b>Видимость: </b><span class="visibility"></span><br>
			</div>
			<img src="resources/images/image 1.png" alt="" class="map">
		</div>

		<div class="forecast_6days">
			<p class="title">Прогноз на 6 дней</p>
			<div class="forecast--list">
			</div>
		</div>

		<div class="view_map">
			<p class="title">Погода на карте</p>
			<div class="maps--list">
				<a target="_blank" href="https://www.windy.com/52.284/76.965?snowAccu,next3d,52.234,76.984,11"><div class="map_item"><img src="resources/images/image 2.png" alt=""> <p class="title">Осдаки</p> </div></a>
				<a target="_blank" href="https://www.windy.com/52.284/76.965?temp,52.234,76.984,11"><div class="map_item"><img src="resources/images/image 3.png" alt=""> <p class="title">Температура</p> </div></a>
				<a target="_blank" href="https://www.windy.com/52.284/76.965?52.234,76.966,11,m:e6jaijr"><div class="map_item"><img src="resources/images/image 4.png" alt=""> <p class="title">Ветер</p> </div></a>
				<a target="_blank" href="https://www.windy.com/52.284/76.965?clouds,52.244,76.983,11"><div class="map_item"><img src="resources/images/image 5.png" alt=""> <p class="title">Облачность</p> </div></a>
			</div>
		</div>	
	</div>
</div>
			<script type="module" src="js/index.js?cache='.uniqid().'"></script>';
 ?>