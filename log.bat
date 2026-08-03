@echo off
cd /d C:\your-project-path

for /l %%x in (1, 1, 10) do (
    echo i commit the code but not show the commit it is scure %%x >> log.bat
    git add .
    git commit -m "Add commit  %%x"
)
i commit the code but not show the commit it is scure 1 
i commit the code but not show the commit it is scure 2 
i commit the code but not show the commit it is scure 3 
