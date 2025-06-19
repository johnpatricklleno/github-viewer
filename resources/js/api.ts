import { Issue } from './types';

const API = '/api';

export const fetchIssues = async (): Promise<Issue[]> =>
  (await fetch(`${API}/issues`)).json();

export const fetchIssue = async (
  owner: string,
  repo: string,
  number: string
): Promise<Issue> =>
  (await fetch(`${API}/issues/${owner}/${repo}/${number}`)).json();
