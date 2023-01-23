<?php

return [
  [
    'title' => "Algorithmes et architecture pour le contrôle de l'exploration d'une zone par une flotte de sous-marins autonomes.",
    'abstract' => "Une mission de chasse aux mines consiste à détecter et localiser des mines, et peut être réalisée grâce au déploiement d'une flotte de robots sous-marins en coopération. Le contexte sous-marin impose cependant des contraintes sur les communications, impliquant des difficultés à l’établissement des stratégies de coopération. Par ailleurs, cette mission est par nature dynamique puisqu'il faut faire face à des aléas, par exemple la détection d'une nouvelle mine va induire de nouveaux objectifs pour le système multirobots. Enfin, il peut exister plusieurs manières de réaliser un objectif, et des contraintes spécifiques peuvent être imposées par l’opérateur. Ces éléments induisent des dépendances complexes entre les tâches à exécuter.
    <br/><br/>
    Les répartitions de ces objectifs au sein du système définissent des problèmes d’allocation de tâches multirobots (« Multi-Robot Task Allocation » ou MRTA) devant être résolus avant et pendant la mission. Au regard des spécificités de la mission, telles que les contraintes de communication et les dépendances complexes pouvant lier les tâches, la résolution d’un problème de MRTA est difficile. La solution d’un problème de MRTA définit un plan qui doit être exécuté par les robots. L’exécution de ce plan n’est cependant pas déterministe, chaque robot doit donc superviser l’exécution de son plan afin d’en détecter les divergences. Au même titre que l’intégration de nouveaux objectifs, ces divergences sont des aléas qu’il faut réparer afin de ne pas compromettre la mission. La mise en place d’algorithmes de décision, de supervision, et de réparation, aptes à répondre à ces défis est au coeur de nos travaux. Nous proposons de faire reposer ces algorithmes sur des méthodes entremêlant allocation par enchères et planification hiérarchique. Enfin, nous tirons profit des structures riches utilisées par l’algorithme de décision pour permettre aux robots de superviser et réparer leurs plans.",
    'speakers' => 'Antoine Milot',
    'date_start' => '13:00',
    'date_end' => '14:00',
    'where' => 'Remote',
    'visio' => 'https://u-bordeaux-fr.zoom.us/j/83483228567',
    'youtube' => '4WVXbh69LCU'
  ],
];
