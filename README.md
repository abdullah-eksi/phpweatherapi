# Hava Durumu Uygulaması

Bu basit PHP tabanlı hava durumu uygulaması, OpenWeatherMap API'sini kullanarak kullanıcıların belirledikleri şehir ve ilçelerin hava durumu bilgilerini almasına olanak tanır.

## Nasıl Çalışır

1. Kullanıcı, belirlediği şehir adını girebilir ve isteğe bağlı olarak bir ilçe adı da ekleyebilir.

2. "Hava Durumu Getir" buttonu  tıkladığında,  get isteği gonderir PHP tarafında OpenWeatherMap API'sini kullanarak hava durumu bilgileri alınır.

3. Alınan bilgiler, ekranda hava durumu açıklaması, sıcaklık ve hava durumu ikonu olarak gösterilir.

## OpenWeatherMap API Kullanımı

Bu uygulama, [OpenWeatherMap API](https://openweathermap.org/api) kullanarak hava durumu verilerini alır. API'den veri almak için bir API anahtarı gereklidir. Bu API anahtarı, kodun başlangıcında `$apiKey` değişkenine atanmalıdır. Örnek bir API anahtarı sağlanmıştır, ancak kendi OpenWeatherMap API anahtarınızı kullanmalısınız. openweathermap farklı apilarını kullanarak 3 günlük 5 günlük veya farklı bir sağlayıcı kullanıp php ile hava durumu api kullanabilirsiniz

## Kurulum

Api kullanmak için aşağıdaki adımları izleyin:

1. Bu projeyi bilgisayarınıza klonlayın veya ZIP dosyası olarak indirin.

2. `index.php` dosyasını bir web sunucusunda çalıştırın.

3. daha sonra isterseniz tasarımı ozelleştirebilrsiniz gelen json degerlerini işleyip daha sık bir tasarım çıkartabilirsiniz 

   
