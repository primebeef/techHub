<?php
$test = range("A", "Z");
$put = "e
kai
ami
ent
ah
vidicani
dai
criesen
ye
yues
noncurab
casan
Ceasomue
ceuriocasis
Dalact 
dris
nosfas 
Terre-is
nonkai
daerariaeh
saqdei 
seir
quli
maegenu
Terre
sas
Nuahic
Sa
Nuncur 
Eine 
es
Jue
matile
miseras
masnir
Nes
nil
nils
nai
saqnari
ou
Jhlidae
Enhe
dui
trans-siree
Kiab 
corienani
vidica
saud
narive
ta
acci
sa
Se
Tas
juoden
joud
haes
ut
Keif
saquer
Corien das
En
Nas 
dsa
dseie
Dilo 
dit
tai
Bofi 
si
juove
equitan
Ces
caesra
vaer
Gsire 
vi-ez
resnir
das
sol
di
mod
mao
phantaspere
bitar
chexe
orx
malittus
maior
facetter
liberimissos";
$patty = "A
Agreed
Am
And 
as
avenger
Averse 
Believe
Bring
But
Call 
can
Come
curious
Dark
did
Did not
Dirt
Do not leave
dreary
False god
Felt
For
Great
Ground 
Had
Hark
Have
Herald
In
Is
It
many
Mercy 
midnight
Mine
No
None
Not being
Not see
Of
Once
Once was 
One
pondered
Pray
quaint
Revenge
Said
show
So
Take
That
The
Their
Them
Thiers
This
To
witness
Against
Not Know
Upon
We
What
Where
Will
Word
Yes
Your
if
boy
cavalry
WHO
dear
ever
Object
death
truth
not
alone
Will be
Before
Still
Apparition
Pitch
Hair
eyes
Bad
nothing
set
free";
$mass = "aut
bet
caes
daes
ie
fis
geche
ashte
eile
jha
kael
elt
mauct
nauct
oct
pfi
ja
ris
sei
tyae
uat
vet
devet
ecz
heyt
sef";
$mass2 = "au
be
cae
dae
ae
fi
ge
ash
ie
jho
kae
el
maue
nau
oc
pha
qa
ri
sie
tae
ua
ve
deve
zec
heae
se";
$mass3 = "a
bes
cael
dael
e
fes
ges
ashe
i
jhos
kaes
ele
maute
naut
oce
phaes
qae
ries
sis
tait
u
ves
deves
zece
heaes
zsae";
echo "letters = {";
$mass = explode("\n",$mass);
$mass2 = explode("\n",$mass2);
$mass3 = explode("\n",$mass3);
$patty = strtoupper($patty);
$patty = explode("\n",$patty);
$put = strtoupper($put);
$put = explode("\n",$put);
$vase = 0;
foreach($test as $e){
    echo "'$e':['".$mass[$vase]."','".$mass2[$vase]."','".$mass3[$vase]."'],";
    //echo $e;
    $vase++;
   // foreach
}
$virt = 0;
foreach($patty as $i){
    echo "'$i':'".$put[$virt]."',";
    $virt++;
}
//echo $mass;
//var_dump($mass);
























?>