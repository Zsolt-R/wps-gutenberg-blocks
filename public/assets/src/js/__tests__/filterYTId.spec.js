import {filterYTid} from '../helpers';

describe("Extract Youtube ID function", () => {

    const url = 'https://www.youtube.com/watch?v=P2Nq-w-A84E&something=else';
    const output = 'P2Nq-w-A84E';

    // test stuff
    test("It should extract the id | P2Nq-w-A84E | from | https://www.youtube.com/watch?v=P2Nq-w-A84E&something=else |", () => {
      expect(filterYTid(url)).toEqual(output);
        
      });

    test("It should extract the id | P2Nq-w-A84E | from | https://www.youtube.com/watch?v=P2Nq-w-A84E |", () => {
        expect(filterYTid(url)).toEqual(output);        
    });

    test("It should extract the id | P2Nq-w-A84E | from | https://www.youtube.com/watch?something=else&v=P2Nq-w-A84E |", () => {
      expect(
        filterYTid('https://www.youtube.com/watch?something=else&v=P2Nq-w-A84E'))
        .toEqual('');        
  });

    test("Pass empty string should return ''", () => {
        expect(filterYTid('')).toEqual('');         
    });

    test("Pass something else than string [1,2,3] should return '' ", () => {
      expect(filterYTid([1,2,3])).toEqual('');         
  });
  });