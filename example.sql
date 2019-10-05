$sql="
SELECT 
	m.member_id
	,m.member_date
	,m.first_name
	,m.last_name
	,m.family_size
	,m.over64
	,m.under19
	,m.addr_line_1
	,m.addr_line_2
	,m.city
	,m.state
	,m.zipcode
	,m.jeffco_resident
	,m.data_review_date
	,m.ethnicity
	,v.visit_id
	,v.visit_date
	,v.line_number
	,v.commodities_box
	,v.commodities_box_num
	,v.commodities_line_num
	,v.commodities_box_pack
FROM 
	members m
,visits v
WHERE m.member_id=v.member_id
AND v.visit_date >= '2019-01-15'
";