while read line
do
	java Edge images/$line >> edge.index
done < index.txt
