@echo off
setlocal enableextensions enabledelayedexpansion
	cinst wget
	mkdir C:\projects\pecl-tools-svn\build
	::rd /s/q "%SDK_CACHE%"
	if not exist "%SDK_CACHE%" (
		echo Cloning remote SDK repository
		echo git clone -q --branch %SDK_BRANCH% %SDK_REMOTE% "%SDK_CACHE%"
		git clone -q --depth=1 --branch %SDK_BRANCH% %SDK_REMOTE% "%SDK_CACHE%"
	) else (
		echo Fetching remote SDK repository
		git --git-dir="%SDK_CACHE%\.git" --work-tree="%SDK_CACHE%" fetch --prune origin
		echo Checkout SDK repository branch
		git --git-dir="%SDK_CACHE%\.git" --work-tree="%SDK_CACHE%" checkout --force %SDK_BRANCH%
	)

	wget -N --progress=bar:force:noscroll https://sourceforge.net/projects/win32svn/files/1.8.17/apache24/svn-win32-1.8.17-ap24_dev.zip/download -O %CACHE_ROOT%\svn-win32-1.8.17-ap24_dev.zip
	wget -N --progress=bar:force:noscroll https://sourceforge.net/projects/win32svn/files/1.8.17/apache24/svn-win32-1.8.17-ap24.zip/download -O %CACHE_ROOT%\svn-win32-1.8.17-ap24_dev.zip
	7z x -y %CACHE_ROOT%\svn-win32-1.8.17-ap24_dev.zip -oC:\projects\
	7z x -y %CACHE_ROOT%\svn-win32-1.8.17-ap24.zip -oC:\projects\

	echo git clone -q --depth=1 --branch=PHP-%PHP_REL% https://github.com/php/php-src C:\projects\php-src
	git clone -q --depth=1 --branch=PHP-%PHP_REL% https://github.com/php/php-src C:\projects\php-src

	xcopy %APPVEYOR_BUILD_FOLDER% C:\projects\php-src\ext\svn\ /s /e /y /f

	xcopy %APPVEYOR_BUILD_FOLDER%\LICENSE %APPVEYOR_BUILD_FOLDER%\artifacts\ /y /f
	xcopy %APPVEYOR_BUILD_FOLDER%\examples %APPVEYOR_BUILD_FOLDER%\artifacts\examples\ /y /f

	if "%APPVEYOR_REPO_TAG_NAME%"=="" (
		set APPVEYOR_REPO_TAG_NAME=%APPVEYOR_REPO_BRANCH%-%APPVEYOR_REPO_COMMIT:~0,8%
		for /f "delims=" %%l in (php_svn.h) do (
			if not "%%l"=="" (
				set line=%%l
				if "!line:~8,24!"=="PHP_SVN_VERSION" (
					set APPVEYOR_REPO_TAG_NAME=!line:~34,-1!-%APPVEYOR_REPO_BRANCH%-%APPVEYOR_REPO_COMMIT:~0,8%
				)
			)
		)

		appveyor SetVariable -Name APPVEYOR_REPO_TAG_NAME -Value !APPVEYOR_REPO_TAG_NAME!
	)
endlocal