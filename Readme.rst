

- Quiz-Package: Phpugh.Quiz

- Model:
  - Quiz (z.B. "Wie gut kennst du dich mit PHP aus?", Timer ein/ausschaltbar)
  - Question (z.B. "Wann ist PHP erschienen?") -> Quiz (Zeit und Punkte definierbar)
  - Answer (z.B. 1993, 1994, 2000) -> Question
  - Result (z.B. User hat bei Frage 1: 1993, bei Frage 2: Katze,...
       als Antwort ausgewählt und das Quiz vollständig abgeschlossen) -> Answer
  - Category
  - Ranking (Userrankings, Quiz)
  - User

- Annahmen:
  - Quiz als zentrales AggregateRoot
  - Ein Quiz hat einen Status (z.B. Entwurf, Live, Archiv)
  - Man kann bei einem Quiz den Timer aktivieren. Die Punkte werden dann abhängig von der verstrichenen Zeit berechnet.
  - Ein Quiz muss einen Titel haben
  - Ein Quiz kann nachdem es live ist nicht mehr bearbeitet werden (Rangliste)
  - Neue Versionen eines Quiz entstehen durch klonen (Questions und Answer werden übernommen)
  - Es gibt immer eine Frage und mind. 2 Antwortmöglichkeiten
  - Ein Quiz hat mindestens ein Frage
  - Nach erfolgreicher Beantwortung des Quiz wird die durchschnittliche Punktezahl der anderen Spieler angezeigt
