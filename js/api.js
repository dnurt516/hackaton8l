export const getWeatherData = async (city) => {
    try {
        const response = await fetch(
            `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=84d8a135713508152422adec07abc16d&lang=ru&units=metric`
        );

        return await response.json();
    } catch (error) {
        console.error(error);
    }
}

