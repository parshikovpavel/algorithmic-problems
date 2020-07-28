# Generate partitions of a set into subsets of equal size

## Condition

I have a set and I want to partition it into sub-set containing equal number of element.

I am looking for a fast algorithm and preferably not heuristic one.

**Hint:**

```
if  n= number of elements in the main set
    l= number of elements in each subset 
```

**A brute force algorithm is:**

> 1-x <-All combinations of n things taken l at a time without repetition. |x|=nCl=n!/(l!*(n-l)!)
> 2-y <-All combinations of x things taken n at a time without repetition. |y|=xCn
>
> 3-Select subsets in y such as there is no any overlap within their elements.

The number of answers is:

```
n!/(l!^(n/l)*(n/l)!)
```

For instance if `S={a,b,c,d}` and if subsets with 2 elements to partition set S is desired:

The set x is :

```
   (a,b),(a,c),(a,d),(b,c),(b,d),(c,d)
```

The set y (potential answers)is :

```
{(a,b),(a,c)}
{(a,b),(a,d)}
{(a,b),(b,c)}
{(a,b),(b,d)}
{(a,b),(c,d)}       
{(a,c),(a,d)}
{(a,c),(b,c)}
{(a,c),(b,d)}
{(a,c),(c,d)}
{(a,d),(b,c)}   
{(a,d),(b,d)} 
{(a,d),(c,d)}   
{(b,c),(d,d)}   
{(b,c),(c,d)}   
{(b,d),(c,d)}   
```

and the correct answers are :

```
S1={(a,b),(c,d)}
S2={(a,c),(b,d)}
S3={(a,d),(b,c)}
```

The mentioned algorithm is useful only when n is small. For instance when:

```
 n=90, l=3 =>
|x|=117480 
|y|=1.28827732e+318
and the number of correct answers is `2.533601e+82`.
```

So the algorithm is not practical for the most case due to time performance and memory issues.

Even having and running an efficient algorithm would be time consuming as the number of results is a lot. For instance in the above problem the number of answers = `2.533601e+82`

I am not expertise in the set theory so maybe it is a well known problem.

Thanks for your help.

## Решение

Начать как в задаче Combinations, выбрать combination размера k. Чтобы не повторялись пары, необходимо зафиксировать элемент i, а затем искать уже комбинации начиная с i-1. Затем продолжить как в задаче Permutations - исключить путем перестановки выбранные элементы из массива и далее рекурсивно искать combinations размера k среди оставшихся элементов