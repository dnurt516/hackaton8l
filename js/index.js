import { getWeatherData } from "./api.js";
import { getForecast } from "./forecast.js";
// import { getData } from "./getData.js";

const app = async() => {
    const weather = await getWeatherData('Павлодар');
    const forecast = await getForecast('Нью-Йорк');

    const getDate = (time_u, only_date=false) => {
        var a = new Date(time_u * 1000);
        var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

        if (!only_date) {
            return a.getDate() + " " + months[a.getMonth()];
        } else {
            return a.getDate();
        }
    }

    const directionOfwWind = (degree) => {
        if (degree > 348.75 || degree < 11.25) return 'N'
        if (326.25 < degree && degree < 348.75) return 'NNW'
        if (303.75 < degree && degree < 326.25) return 'NW'
        if (281.25 < degree && degree < 303.75) return 'WNW'
        if (258.75 < degree && degree < 281.25) return 'W'
        if (236.25 < degree && degree < 258.75) return 'WSW'
        if (213.75 < degree && degree < 236.25) return 'SW'
        if (191.25 < degree && degree < 213.75) return 'SSW'
        if (168.75 < degree && degree < 191.25) return 'S'
        if (146.25 < degree && degree < 168.75) return 'SSE'
        if (123.75 < degree && degree < 146.25) return 'SE'
        if (101.25 < degree && degree < 123.75) return 'ESE'
        if (78.75 < degree && degree < 101.25) return 'E'
        if (56.25 < degree && degree < 78.75) return 'ENE'
        if (33.75 < degree && degree < 56.25) return 'NE'
        if (11.25 < degree && degree < 33.75) return 'NNE'
    }

    $('.weather--today__data .temperature img').attr('src', 'https://openweathermap.org/img/w/'+forecast.list[0].weather[0].icon+'.png');
    $('.weather--today__data .temperature span').text(Math.round(weather.main.temp)+'°C');
    $('.weather--today__data .feel_temp').text("По ощущениям "+Math.round(weather.main.feels_like)+'°C. '+(forecast.list[0].weather[0].description[0].toUpperCase() + forecast.list[0].weather[0].description.slice(1)) + ". " + weather.weather[0].description[0].toUpperCase() + weather.weather[0].description.slice(1));
    $('.weather--today__data .wind').text(weather.wind.speed + " м/с " + directionOfwWind(weather.wind.deg));
    $('.weather--today__data .humidity').text(weather.main.humidity + "%");
    $('.weather--today__data .pressure').text(weather.main.pressure + "гПа");
    $('.weather--today__data .visibility').text(weather.visibility/1000 + "км");

    var forecast_days = {};
    var forecast_days_data = {};
    var forecast_order = [];

    for (var i = 0; i < forecast.list.length; i++) {
        forecast_days[getDate(forecast.list[i].dt)] = [];
        forecast_days_data[getDate(forecast.list[i].dt)] = [];

        if (!forecast_order.includes(getDate(forecast.list[i].dt))) {
            forecast_order.push(getDate(forecast.list[i].dt));
        }
    }

    for (var i = 0; i < forecast.list.length; i++) {
        forecast_days[getDate(forecast.list[i].dt)].push(forecast.list[i].main.feels_like);
        forecast_days[getDate(forecast.list[i].dt)].push(forecast.list[i].main.temp);
        forecast_days_data[getDate(forecast.list[i].dt)] = [forecast.list[i].weather[0].icon, forecast.list[i].weather[0].description];
    }

    for (var key in forecast_days) {
        forecast_days[key] = [Math.round((Math.max(...forecast_days[key]))-273.15), Math.round((Math.min(...forecast_days[key]))-273.15)];
    }

    for (var i in forecast_order) {
        var key = forecast_order[i];
        $('.forecast_6days .forecast--list').append('<div class="forecast"><span class="date">'+key+'</span><div class="temperature"><img src="https://openweathermap.org/img/w/'+forecast_days_data[key][0]+'.png" alt=""><span>'+forecast_days[key][0]+' / '+forecast_days[key][1]+'°C'+'</span></div><span class="description">'+forecast_days_data[key][1]+'</span></div>');
    }

    console.log(forecast_days_data);
}

$(document).ready(function(){
    app();
});