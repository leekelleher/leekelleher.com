DELETE FROM
	dataTypeConfig
WHERE
	ROWID NOT IN (
		SELECT
			MIN(ROWID)
		FROM
			dataTypeConfig
		GROUP BY
			dataType,
			key,
			value
	)
;

DELETE FROM
	dataTypes
WHERE
	ROWID NOT IN (
		SELECT
			MIN(ROWID)
		FROM
			dataTypes
		GROUP BY
			dataType,
			editorAlias,
			umbracoId,
			umbracoVersion,
			contentmentVersion
	)
;

-- SELECT dataType FROM dataTypes WHERE umbracoId = '00000000-0000-0000-0000-000000000000';
-- DELETE FROM dataTypes WHERE umbracoId = '00000000-0000-0000-0000-000000000000';
-- UPDATE dataTypes SET umbracoVersion = '9.0.1' WHERE umbracoVersion = '9.0.1+bef1ccedca45b16a1a51178c45c2bec3302caf53'
