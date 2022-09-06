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

DELETE FROM
	dataTypeConfig
WHERE
	dataType NOT IN (
		SELECT DISTINCT 
			dataType 
		FROM
			dataTypes
	)
;

-- SELECT dataType FROM dataTypes WHERE umbracoId = '00000000-0000-0000-0000-000000000000';
-- DELETE FROM dataTypes WHERE umbracoId = '00000000-0000-0000-0000-000000000000';

-- SELECT * FROM dataTypes WHERE umbracoVersion = '9.0.0+5bfab13dc5a268714aad2426a2b68ab5561a6407';
-- UPDATE dataTypes SET umbracoVersion = '9.0.0' WHERE umbracoVersion = '9.0.0+5bfab13dc5a268714aad2426a2b68ab5561a6407';

-- SELECT * FROM dataTypes WHERE umbracoVersion = '9.0.1+bef1ccedca45b16a1a51178c45c2bec3302caf53';
-- UPDATE dataTypes SET umbracoVersion = '9.0.1' WHERE umbracoVersion = '9.0.1+bef1ccedca45b16a1a51178c45c2bec3302caf53';

-- DELETE FROM dataTypeConfig WHERE dataType = 'e05e522a-9cf2-4373-ad0e-1f4160b079d8';
