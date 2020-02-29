#git status to check changed files
git status

#commit changes to local repository
git commit -a  -m "second commit"

#Initial step to add remote repository to project  folder 
git remote add bugsRus https://github.com/Geethali/bugsRus.git

#initial push to relevant remote repository with the relevant branch
git push --set-upstream bugsRus master

#push command after initial push
git push


