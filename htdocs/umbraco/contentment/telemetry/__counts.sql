SELECT DISTINCT
	value AS [dataSources]
FROM
	dataTypeConfig
WHERE
	[key] = 'dataSource' AND
	(value LIKE '%.%' OR value LIKE '%, App_Code')
ORDER BY
	value ASC
;

SELECT DISTINCT
	value AS [listEditor]
FROM
	dataTypeConfig
WHERE
	[key] = 'listEditor' AND
	(value LIKE '%.%' OR value LIKE '%, App_Code')
ORDER BY
	value ASC
;

SELECT DISTINCT
	value AS [displayMode]
FROM
	dataTypeConfig
WHERE
	[key] = 'displayMode' AND
	(value LIKE '%.%' OR value LIKE '%, App_Code')
ORDER BY
	value ASC
;

-- Upgrade paths for Contentment
SELECT
	umbracoId,
	COUNT(DISTINCT contentmentVersion) AS [count],
	GROUP_CONCAT(DISTINCT contentmentVersion) AS [versions]
FROM
	dataTypes
GROUP BY
	umbracoId
HAVING
	[count] > 1
ORDER BY
	[count] DESC
;

-- Number of Umbraco instances that have upgraded Contentment
SELECT
	COUNT(*) AS [count]
FROM (
	SELECT
		umbracoId,
		COUNT(DISTINCT contentmentVersion) AS [versions]
	FROM
		dataTypes
	GROUP BY
		umbracoId
	HAVING
		[versions] > 1
)
;

--	-- Upgrade paths for Umbraco
-- 	SELECT
-- 		umbracoId,
-- 		COUNT(DISTINCT umbracoVersion) AS [count],
-- 		GROUP_CONCAT(DISTINCT umbracoVersion) AS [versions]
-- 	FROM
-- 		dataTypes
-- 	GROUP BY
-- 		umbracoId
-- 	HAVING
-- 		[count] > 1
-- 	ORDER BY
-- 		[count] DESC
-- 	;

-- Umbraco installs upgraded from v8 to v9
SELECT
	GROUP_CONCAT(DISTINCT umbracoVersion) AS [versions],
	COUNT(DISTINCT umbracoVersion) AS [count]
FROM
	dataTypes
GROUP BY
	dataType
HAVING
	[count] > 1
--	AND [versions] LIKE '8.%,9.%'
ORDER BY
	[count] DESC
;

