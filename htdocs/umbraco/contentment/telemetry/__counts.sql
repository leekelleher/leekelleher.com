SELECT DISTINCT
	value AS [dataSources]
FROM
	dataTypeConfig
WHERE
	[key] = 'dataSource' AND
	value LIKE '%.%'
ORDER BY
	value ASC
;

SELECT DISTINCT
	value AS [listEditor]
FROM
	dataTypeConfig
WHERE
	[key] = 'listEditor' AND
	value LIKE '%.%'
ORDER BY
	value ASC
;

SELECT DISTINCT
	value AS [displayMode]
FROM
	dataTypeConfig
WHERE
	[key] = 'displayMode' AND
	value LIKE '%.%'
ORDER BY
	value ASC
;

-- Upgrade paths
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