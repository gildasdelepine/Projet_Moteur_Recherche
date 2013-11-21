while read line
do
	java Color images/$line	>> color.index
done < index.txt
