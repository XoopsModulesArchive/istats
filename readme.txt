NAK£ADKA JEST DOSTARCZANA BEZ ¯ADNEJ GWARANCJI
KONIECZNIE ZRÓB KOPIÊ ZAPASOW¡ PLIKU /istats/include/gd.php !!!

*---------* Nak³adka na istat 2.1 by maciej *---------* 

Poprawi³em wy¶wietlanie wykresu dziennego odwiedzin
a dok³adnie skali "Y" i lini ¶redniego wykresu.
Za wy¶wietlanie odpowiedzialny jest plik istats/include/gd.php
i w nim poczyni³em stosowne zmiany.

Lista zmian:
-------------------------
1. Format wykresu zmieniony z JPG na PNG (nie rozmywa i nie ma artefaktów kompresji) 
2. O¶ Y: nowy algorytm podzia³ki uwzglêdniaj±cy ma³e ilo¶ci (poni¿ej 8) ¶rednich wizyt dziennych
3. Dodana Legenda - "¶rednia linia wizyt"
4. Dodano polski interfejsu u¿ytkownika (front-end). Administracja jest po angielsku.
5. Pliki jêzykowe kodowane UTF-8 s± w podkatalogu /istats/language/polish/utf-8/

Instalacja
-------------------------
1. Zarchiwizowaæ plik /istats/include/gd.php w bezpiecznym miejscu.
2. Rozpakowane archiwum wgraæ do katalogu modules.


P.S.
Wykres, o którym mowa powy¿ej nie jest generowany dla anonimowych u¿ytkowników. Nale¿y siê zalogowaæ by go zobaczyæ.