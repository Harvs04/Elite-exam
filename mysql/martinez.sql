ALTER TABLE exam CHANGE `ï»¿Artist` Artist VARCHAR(255);

<!-- 1. -->
SELECT Artist, `2022 Sales` as "Sales" FROM exam;

<!-- 2. -->
SELECT Artist, sum(`2022 Sales`) AS `Combined Album Sales` FROM exam GROUP BY Artist;

<!-- 3. -->
SELECT Artist, SUM(`2022 Sales`) AS `Combined Album Sales` FROM exam GROUP BY Artist ORDER BY SUM(`2022 Sales`) DESC LIMIT 1;

<!-- 4. -->
SELECT 
    Album, Sales, `Year Released` 
FROM (
    SELECT 
        Album,
        `2022 Sales` as "Sales",
        CONCAT("20", SUBSTRING(`Date Released`, 1, 2)) as "Year Released",
        ROW_NUMBER() OVER (
            PARTITION BY SUBSTRING(`Date Released`, 1, 2)
            ORDER BY `2022 Sales` DESC
        ) AS rank
    FROM exam
) AS list
WHERE rank <= 10;

<!-- 5. -->
SELECT Album 
FROM exam 
WHERE LOWER(Artist) LIKE '%search_input%';
