jarsigner -verbose -keystore key -sigalg SHA1withRSA -digestalg SHA1 app-release-unsigned.apk emuh
zipalign -f -v 4 app-release-unsigned.apk run.apk