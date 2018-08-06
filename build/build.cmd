@echo off
powershell -ExecutionPolicy Unrestricted ./build/build.ps1 %CAKE_ARGS% %*
