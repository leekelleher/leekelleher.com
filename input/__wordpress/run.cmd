..\..\.wyam\wyam.exe --input . --output ..\posts --noclean

@IF %ERRORLEVEL% NEQ 0 GOTO err
@EXIT /B 0
:err
@PAUSE
@EXIT /B 1