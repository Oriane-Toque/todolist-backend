# Data's dico

## TASKS

|Field|Type|Specifity|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED|Task's id|
|title|VARCHAR(64)|NOT NULL|Title's task|
|completion|INT|NULL|Completion's task|
|category_id|INT|NOT NULL, UNSIGNED|Category's id of task|
|status|TINYINT|NOT NULL, DEFAULT 0|Completed(2) Todo(1)|
|created_at|TIMESTAMP|NOT NULL, CURRENT TIMESTAMP|Date of creation|
|updated_at|TIMESTAMP|NULL, CURRENT TIMESTAMP|Date of update|

## CATEGORIES

|Field|Type|Specifity|Description|
|-|-|-|-|
|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED|Category's id|
|name|VARCHAR(64)|NOT NULL|Name's category|
|status|TINYINT|NOT NULL, DEFAULT 0|Assigned(1) Not assigned(0)|
|created_at|TIMESTAMP|NOT NULL, CURRENT TIMESTAMP|Date of creation|
|updated_at|TIMESTAMP|NULL, CURRENT TIMESTAMP|Date of update|
