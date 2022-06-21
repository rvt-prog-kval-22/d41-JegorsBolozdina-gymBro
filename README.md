# Lietotāju vingrojumu analīzes un datu uzskaites automatizētā sistēma

Kvalifikācijas darba uzdevums ir izveidot lietotāju vingrojumu analīzes un datu uzskaites sistēmu, ar kuru palīdzību ikviens lietotājs varēs pārskatīt savus sasniegumus, saņemt sporta vingrojumu pārskatu, kur būs dažāda informācija par veiktiem vingrojumiem. Šī sistēma palīdzēs risināt vairākas problēmas, kuras varētu rasties, nodarbojoties ar sportu, tādas ka: nepareiza vingrinājumu veikšana, lēns progress, traumas, grūtības atrast apkopotus materiālus visiem vajadzīgiem materiāliem, kas neļauj cilvēkam sasniegt lielākus rezultātus ātrākajā laikā. Sistēmai ir jānodrošina iespēja pievienot lietotājus ar dažādiem statusiem, ļaut izveidot vingrinājumus, komentārus pie vingrinājumiem, lai veiktu darbības ar tiem datiem, kā piemēram, statistiski apstrādāt lietotāja izietus vingrinājumus.

# Izmantotas tehnoloģijas

Backend: PHP, Laravel, MySQL

Frontend: Laravel Blade, Vue, Tailwind

# Izmantotie avoti

1. Laravel Documentation. https://laravel.com/docs/9.x/ Resurss apskatīts 01.06.2022.
2. Sistēmu programmēšana PNIT (4. kursi) 2021./2022. https://e.rvt.lv/course/view.php?id=400 Resurss apskatīts 01.06.2022.
3. Vue.js Documentation. https://vuejs.org/guide/introduction.html Resurss apskatīts 01.06.2022.
4. Datu bāzu programmēšana (4.kurss). https://e.rvt.lv/course/view.php?id=308 Resurss apskatīts 01.06.2022.
5. Laravel + Vue video materiāls. https://www.youtube.com/watch?v=KSHt4Ig4GLI Resurss apskatīts 01.06.2022.
6. Laravel Blade + Vue video materiāls. https://www.youtube.com/watch?v=4uVNz9sQn18 Resurss apskatīts 01.06.2022.
7. Laravel Migration Tips video materiāls. https://www.youtube.com/watch?v=bSQcmcu6yHc Resurss apskatīts 01.06.2022.
8. Docker Desktop. https://www.docker.com/products/docker-desktop/ Resurss apskatīts 01.06.2022.
9. WSL2 instalēšanas pamacība. https://www.omgubuntu.co.uk/how-to-install-wsl2-on-windows-10 Resurss apskatīts 01.06.2022.

# Instrukcija

Lai palaistu sistēmu ir vajadzīga programma Docker Desktop, kas izveidos virtualos konteinerus WSL2 vidē ar visiem vajadzīgiem rīkiem, no kuriem ir atkarīga šis sistēmas strādāšana.

1. Uzinstalēt Docker Desktop, iegūstot to Docker mājaslapā un sekojot instalācijas instrukcijām.
2. Uzinstalēt WSL2 ar Ubuntu 20.04.4 LTS distributīvu no Microsoft Store.
3. Uzinstalēt “git” iekš WSL2, lai varētu nokopēt repozitoriju.
4. Kopēt sev šis programmas repozitorijas sastāvu iekš WSL2 ar “git clone” komandu.
5. Ieiet jaunajā direktorijā un ierakstīt komandu “./vendor/bin/sail up”, lai palaistu Docker konteinerus un visi “packages”, vajadzīgie šai sistēmai, ieinstalētos.
6. Palaist migrācijas ar komandu “./vendor/bin/sail artisan migrate”, lai izveidotos datubāzes tabulas ar datiem.

**VAI**

Ja serveris ir ieslēgts, to var apmeklēt, ierakstot http://159.223.12.215/ sava parlūkprogrammā.
Superadmin dati 
E-pasts: superadmin@admin.com 
Parole: 12345678

