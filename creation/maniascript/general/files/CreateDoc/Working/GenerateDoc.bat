set ManiaPlanetDrive=D:
set ManiaPlanetDir="C:\Program Files (x86)\ManiaPlanet\"
set DoxygenDir="C:\Program Files\doxygen\bin\"

set CurrentDir=%~dp0%
set CurrentDrive=%~d0%

cls

%ManiaPlanetDrive%
cd %ManiaPlanetDir%
ManiaPlanet.exe /generatescriptdoc="%CurrentDir%..\Sources\doc.h"
%CurrentDrive%
cd "%CurrentDir%"
%DoxygenDir%doxygen.exe "%CurrentDir%DoxyFile"
pause